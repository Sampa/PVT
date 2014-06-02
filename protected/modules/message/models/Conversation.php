<?php

/**
 * This is the model class for table "Conversation".
 *
 * The followings are the available columns in table 'Conversation':
 * @property integer $id
 * @property integer $recruiterId
 * @property integer $publisherId
 * @property string $title
 * @property string $date
 *
 * The followings are the available model relations:
 * @property User $publisher
 * @property Recruiter $recruiter
 */
class Conversation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Conversation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, recruiterId, publisherId, title, date', 'safe', 'on'=>'search'),
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
			'publisher' => array(self::BELONGS_TO, 'User', 'publisherId'),
			'recruiter' => array(self::BELONGS_TO, 'Recruiter', 'recruiterId'),
            'messages' => array(self::HAS_MANY, 'Message','conversationId','order'=>"messages.created_at")
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'recruiterId' => 'Recruiter',
			'publisherId' => 'Publisher',
			'title' => 'Title',
			'date' => 'Date',
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
		$criteria->compare('recruiterId',$this->recruiterId);
		$criteria->compare('publisherId',$this->publisherId);
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
	 * @return Conversation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function messageCountSent(){
        return Message::model()->count("conversationId=:cId AND sender_id=:sId",array("cId"=>$this->id,"sId"=>user()->id));
    }
    public function messageCountReceived(){
        return Message::model()->count("conversationId=:cId AND receiver_id=:sId",array("cId"=>$this->id,"sId"=>user()->id));
    }
    public function messageCountTotal(){
        return Message::model()->count("conversationId=:cId",array("cId"=>$this->id));
    }
}
