<?php

/**
 * This is the model class for table "ReportedCv".
 *
 * The followings are the available columns in table 'ReportedCv':
 * @property integer $id
 * @property integer $reportedBy
 * @property string $date
 * @property integer $cvId
 * @property string $reason
 *
 * The followings are the available model relations:
 * @property Cv $cv
 */
class ReportedCv extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ReportedCv';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reportedBy, cvId', 'required'),
			array('reportedBy, cvId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, reportedBy, date, cvId, reason', 'safe', 'on'=>'search'),
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
			'cv' => array(self::BELONGS_TO, 'Cv', 'cvId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'reportedBy' => 'Reported By',
			'date' => 'Date',
			'cvId' => 'Cv',
			'reason' => 'Reason',
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
		$criteria->compare('reportedBy',$this->reportedBy);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('cvId',$this->cvId);
		$criteria->compare('reason',$this->reason,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReportedCv the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
