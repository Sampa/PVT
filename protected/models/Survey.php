<?php

/**
 * This is the model class for table "Survey".
 *
 * The followings are the available columns in table 'Survey':
 * @property integer $id
 * @property integer $recruiterID
 * @property string $title
 * @property string $date
 *
 * The followings are the available model relations:
 * @property Recruiter $recruiter
 * @property SurveyCandidate[] $surveyCandidates
 * @property SurveyQuestion[] $surveyQuestions
 */
class Survey extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Survey';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('recruiterID, title, date', 'required'),
			array('recruiterID', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, recruiterID, title, date', 'safe', 'on'=>'search'),
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
			'recruiter' => array(self::BELONGS_TO, 'Recruiter', 'recruiterID'),
			'surveyCandidates' => array(self::HAS_MANY, 'SurveyCandidate', 'surveyID'),
			'surveyQuestions' => array(self::HAS_MANY, 'SurveyQuestion', 'surveyID'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'recruiterID' => 'Recruiter',
			'title' => 'Title',
			'date' => 'Date',
		);
	}
    public function numberOfCandidates(){
        return $this->numberOfResponses(true);
    }
    public function numberOfResponses($totalCount=false){
        $c = new CDbCriteria();
        $c->compare("surveyId", $this->id);
        if(!$totalCount){
            $c->compare("answered", 1);
        }
        return SurveyCandidate::model()->count($c);
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
		$criteria->compare('recruiterID',Yii::app()->user->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Survey the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
