<?php
// Include Composer autoloader if not already done.
  include 'vendor/autoload.php';

/**
 * This is the model class for table "Cv".
 *
 * The followings are the available columns in table 'Cv':
 * @property integer $id
 * @property integer $showUserDetail
 * @property string $date
 * @property string $pathToPdf
 * @property string $typeOfEmployment
 * @property integer $geographicAreaId
 * @property string $title
 * @property string $pdfText
 * @property integer $publisherId
 *
 * The followings are the available model relations:
 * @property GeograficArea $geographicArea
 * @property User $publisher
 * @property CvTag[] $cvTags
 * @property HotList[] $hotLists
 * @property Message[] $messages
 * @property RecFavorites[] $recFavorites
 * @property ReportedCv[] $reportedCvs
 * @property mixed        hasGeoArea
 */

//require_once('yii/framework/yii.php');
//require_once('../../yii/framework/yii.php');
//require_once(Yii::app()->basePath . '../../yii/framework/yii.php');
class Cv extends CActiveRecord
{
    /*
     * Variable used to determine if we need to add an error class to the "select country dropdown"
     * If you try to create a CV without choosing country this will be set to
     * false and a red border will be drawn around the three diffrent GeographicArea fields in the create CV form
     */
    public $hasGeoArea = true;
    public $tags;
    public $geographicArea = null;
//    public $numberOfLinks;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Cv';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('typeOfEmployment,  title', 'required'),
			array('showUserDetail, publisherId', 'numerical', 'integerOnly'=>true),
			array(' typeOfEmployment, title', 'length', 'max'=>255),
			// The following rule is used by search().
			array('date, typeOfEmployment, geographicAreaId, title, pdfText', 'safe', 'on'=>'search'),
			array('date, typeOfEmployment, geographicAreaId, title, pdfText,pathToPdf,numberOfLinks', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'area' => array(self::MANY_MANY, 'GeograficArea','CvArea(cvId,AreaId)'),
			'publisher' => array(self::BELONGS_TO, 'User', 'publisherId'),
			'cvTags' => array(self::HAS_MANY, 'CvTag', 'cvId'),
			'hotLists' => array(self::HAS_MANY, 'HotList', 'cvId'),
			'messages' => array(self::HAS_MANY, 'Message', 'cvID'),
			'recFavorites' => array(self::HAS_MANY, 'RecFavorites', 'cvid'),
			'reportedCvs' => array(self::HAS_MANY, 'ReportedCv', 'cvId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'showUserDetail' => Yii::t('t','Vill du visa dina uppgifter'),
			'date' => Yii::t('t','Datum'),
			'pathToPdf' =>Yii::t('t','Sökväg till pdf'),
			'typeOfEmployment' => Yii::t('t','Anställningsform'),
			'geographicAreaId' => Yii::t('t','Geografiskt area'),
			'title' => Yii::t('t','Rubrik på ditt CV'),
			'pdfText' => 'Pdf Text',
			'publisherId' => 'Publisher',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('showUserDetail',$this->showUserDetail);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('pathToPdf',$this->pathToPdf,true);
		$criteria->compare('typeOfEmployment',$this->typeOfEmployment,true);
		$criteria->compare('geographicAreaId',$this->geographicAreaId);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('pdfText',$this->pdfText,true);
		$criteria->compare('publisherId',Yii::app()->user->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

	}
	public function beforeSave(){
		try{
            $this-> publisherId=Yii::app()->user->id;
        }catch (CException $foo){
            return true;
        }
		parent::beforeSave( );
		//if we can add the pdf return true so saving to the database tables goes thrue
		return true;
    }
	public function afterSave(){
        try{
            $this->addPdfFromTmpFolder();
        }catch (CException $foo){
            return true;
        }
	}
	public function addPdfFromTmpFolder( ) {
		//the cv to be updated with a pdf link
		$cv = Cv::model()->findByPk($this->id);
		//if all @ upload went fine we will have a session called pdf created
		if( Yii::app( )->user->hasState( 'pdf' ) ) {
			$pdf = Yii::app( )->user->getState( 'pdf' );
			//Resolve the final path for our pdf's
			$path = Yii::app( )->getBasePath( )."/../pdf/{$this->id}/";
			//Create the folder and give permissions if it doesnt exists
			if( !is_dir( $path ) ) {
				mkdir( $path );
				chmod( $path, 0777 );
			}
			//code designed for multiple files, hence the loop
			foreach( $pdf as $file) {
				if( is_file( $file["path"] ) ) {
					//direct path
					$newPath = $path.$file["filename"];
					//move file from temporary folder to end destination
					copy($file["path"],$newPath);
					//a relative public path that we assign to the "pathToPdf" attribute (this gets saved in the database)
					$cv->pathToPdf =  "/pdf/".$this->id."/".$file["filename"];


				} else{
					Yii::log( $file["path"]." is not a file", CLogger::LEVEL_WARNING );
				}
			}
			/*
			 * Clear the user's session
			 * saves the updatet cv information,
			 * do note change order of these two or endless loop is begun
			 */

            // Parse pdf file and build necessary objects.
            $parser = new \Smalot\PdfParser\Parser();
            $pathThatWorksWithParser = preg_replace("/\//","",$cv->pathToPdf,1);
            $pdf  = $parser->parseFile($pathThatWorksWithParser);
            $text = $pdf->getText();
            $cv->pdfText = $text;
			Yii::app( )->user->setState( 'pdf', null );
            $cv->save();
        }
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cv the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function registerjs($cvID){

        Yii::app()->controller->renderPartial("/cv/_cronJobJs",array("cvId"=>$cvID));
        return true;
    }
}
