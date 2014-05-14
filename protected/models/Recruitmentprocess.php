<?php

/**
 * This is the model class for table "recruitmentprocess".
 *
 * The followings are the available columns in table 'recruitmentprocess':
 * @property integer $id
 * @property string $title
 * @property integer $recruiterId
 * @property string $startDate
 * @property string $endDate
 * @property string $typeOfEmployment
 * @property string $typeOfService
 * @property integer $salaryOfHired
 * @property string $company
 * @property integer $geographicAreaID
 * @property string $successfulProcess
 *
 * The followings are the available model relations:
 * @property Hotlist[] $hotlists
 * @property Recruiter $recruiter
 */
class Recruitmentprocess extends CActiveRecord
{
	public $hotlistId;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'RecruitmentProcess';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, typeOfEmployment', 'required'),
			// array('recruiterId, salaryOfHired, geographicAreaID', 'numerical', 'integerOnly'=>true),
			array('typeOfEmployment, typeOfService, successfulProcess', 'length', 'max'=>255),
			// array('endDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, recruiterId, startDate, endDate, typeOfEmployment, typeOfService, salaryOfHired, company, geographicAreaID, successfulProcess', 'safe', 'on'=>'search'),
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
			'hotlists' => array(self::HAS_MANY, 'Hotlist', 'rpId'),
			'recruiter' => array(self::BELONGS_TO, 'Recruiter', 'recruiterId'),
            'geographicArea' => array(self::BELONGS_TO, 'GeograficArea', 'geographicAreaID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => Yii::t("t","Titel"),
			'recruiterId' => 'recruiter',
			'startDate' => 'Start Date',
			'endDate' => 'End Date',
			'typeOfEmployment' => Yii::t("t",'Anställningsform'),
			'typeOfService' => Yii::t("t", "Typ av tjänst"),
			'salaryOfHired' => Yii::t("t", "Lön för anställd"),
			'company' => Yii::t("t","Företag"),
			'geographicAreaID' => Yii::t("t","Geografisk plats"),
			'successfulProcess' => Yii::t("t","Lyckad rekrytering?"),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('recruiterId',$this->recruiterId);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('typeOfEmployment',$this->typeOfEmployment,true);
		$criteria->compare('typeOfService',$this->typeOfService,true);
		$criteria->compare('salaryOfHired',$this->salaryOfHired);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('geographicAreaID',$this->geographicAreaID);
		$criteria->compare('successfulProcess',$this->successfulProcess,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recruitmentprocess the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
