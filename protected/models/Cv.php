<?php

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
 */
class Cv extends CActiveRecord
{
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
			//array('showUserDetail, typeOfEmployment,  title', 'required'),
			//array('showUserDetail, publisherId', 'numerical', 'integerOnly'=>true),
			//array(' typeOfEmployment, title', 'length', 'max'=>255),
			// The following rule is used by search().
			array('date, typeOfEmployment, geographicAreaId, title, pdfText', 'safe', 'on'=>'search'),
			array('date, typeOfEmployment, geographicAreaId, title, pdfText,pathToPdf', 'safe'),
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
			'geographicArea' => array(self::BELONGS_TO, 'GeograficArea', 'geographicAreaId'),
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
			'pathToPdf' => '',
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
        $this->geographicAreaId=  1;
		$this-> publisherId=Yii::app()->user->id;
//        $this->pathToPdf ="/pdf/filenamn.pdf";
        return true;
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
}
