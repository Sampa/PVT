<?php

/**
 * This is the model class for table "SurveyAnswer".
 *
 * The followings are the available columns in table 'SurveyAnswer':
 * @property integer $id
 * @property integer $surveyQuestionID
 * @property string $questionAnswer
 *
 * The followings are the available model relations:
 * @property SurveyQuestion $surveyQuestion
 */
class SurveyAnswer extends CActiveRecord
{
    public $answeredBy;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SurveyAnswer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('surveyQuestionID, questionAnswer', 'required'),
			array('surveyQuestionID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, surveyQuestionID, questionAnswer', 'safe', 'on'=>'search'),
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
			'surveyQuestion' => array(self::BELONGS_TO, 'SurveyQuestion', 'surveyQuestionID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'surveyQuestionID' => 'Survey Question',
			'questionAnswer' => 'Question Answer',
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
		$criteria->compare('surveyQuestionID',$this->surveyQuestionID);
		$criteria->compare('questionAnswer',$this->questionAnswer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SurveyAnswer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
