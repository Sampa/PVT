<?php

/**
 * This is the model class for table "SurveyQuestion".
 *
 * The followings are the available columns in table 'SurveyQuestion':
 * @property integer $id
 * @property string $question
 * @property integer $surveyID
 * @property integer $haveOptions
 * @property integer $allowMultipleChoice
 *
 * The followings are the available model relations:
 * @property SurveyAnswer[] $surveyAnswers
 * @property Survey $survey
 */
class SurveyQuestion extends CActiveRecord
{
    public $type;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SurveyQuestion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, surveyID, haveOptions, allowMultipleChoice', 'required'),
			array('surveyID, haveOptions, allowMultipleChoice', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question, surveyID, haveOptions, allowMultipleChoice', 'safe', 'on'=>'search'),
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
			'surveyAnswers' => array(self::HAS_MANY, 'SurveyAnswer', 'surveyQuestionID'),
			'survey' => array(self::BELONGS_TO, 'Survey', 'surveyID'),
			'options' => array(self::HAS_MANY, 'SurveyQuestionOption', 'questionId'),
		);
	}

    public function getAnswerByUser($userId){
        $criteria = new CDbCriteria();
        $criteria->compare("surveyQuestionID",$this->id);
        $criteria->compare("answeredBy",$userId);
        $criteria->limit = 1;
        $answer = SurveyAnswer::model()->find($criteria);
        return $answer;
    }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question' => 'Question',
			'surveyID' => 'Survey',
			'haveOptions' => 'Have Options',
			'allowMultipleChoice' => 'Allow Multiple Choice',
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
		$criteria->compare('question',$this->question,true);
		$criteria->compare('surveyID',$this->surveyID);
		$criteria->compare('haveOptions',$this->haveOptions);
		$criteria->compare('allowMultipleChoice',$this->allowMultipleChoice);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SurveyQuestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
