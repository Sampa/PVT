<?php

/**
 * This is the model class for table "recruiter".
 *
 * The followings are the available columns in table 'recruiter':
 * @property string $VAT
 * @property integer $userId
 * @property string $orgName
 *
 * The followings are the available model relations:
 * @property Message[] $messages
 * @property User $user
 * @property Recruitmentprocess[] $recruitmentprocesses
 * @property Survey[] $surveys
 */
class Recruiter extends CActiveRecord
{
	public $beenToSurveyPage;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Recruiter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('VAT, userId, orgName', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('VAT, orgName', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('VAT, userId, orgName', 'safe', 'on'=>'search'),
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
			'messages' => array(self::HAS_MANY, 'Message', 'recruiterID'),
			'user' => array(self::BELONGS_TO, 'User', 'userId'),
			'recruitmentprocesses' => array(self::HAS_MANY, 'Recruitmentprocess', 'recruiterId'),
			'surveys' => array(self::HAS_MANY, 'Survey', 'recruiterID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'VAT' => Yii::t('t', 'VAT'),
			'userId' => 'User',
			'orgName' => Yii::t('t', 'Företagsnamn'),
		);
	}
    public static function getProcessesAsList(){
        $loggedInRecruiter = Recruiter::model()->findByPk(Yii::app()->user->id);
        if($loggedInRecruiter){
            Yii::app()->controller->renderPartial("/recruiter/_recruiterProcessesAsList",
                array("processes"=>$loggedInRecruiter->recruitmentprocesses)
            );
        }
    }
    public static function getSurveysAsList(){
    	$loggedInRecruiter = Recruiter::model()->findByPk(Yii::app()->user->id);
    	if($loggedInRecruiter) {
    		Yii::app()->controller->renderPartial("/recruiter/_recruiterSurveysAsList",
                array("surveys"=>$loggedInRecruiter->surveys)
            );
    	}
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

		$criteria->compare('VAT',$this->VAT,true);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('orgName',$this->orgName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recruiter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
