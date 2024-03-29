    <?php

/**
 * This is the model class for table "{{messages}}".
 *
 * The followings are the available columns in table '{{messages}}':
 * @property integer $id
 * @property integer $sender_id
 * @property integer $receiver_id
 * @property string $subject
 * @property string $body
 * @property string $is_read
 * @property string $deleted_by
 * @property string $created_at
 */
class Message extends CActiveRecord
{
    /**
     *
     */
    const DELETED_BY_RECEIVER = 'receiver';
    /**
     *
     */
    const DELETED_BY_SENDER = 'sender';

    /**
     * @var
     */
    public $userModel;
    /**
     * @var
     */
    public $userModelRelation;

    /**
     * @var
     */
    public $unreadMessagesCount;

    /**
     * @param string $scenario
     */
    public function __construct($scenario = 'insert') {
		$this->userModel = Yii::app()->getModule('message')->userModel;
		$this->userModelRelation = Yii::app()->getModule('message')->userModelRelation;
		return parent::__construct($scenario);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * @return Message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{messages}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sender_id, receiver_id', 'required'),
			array('sender_id, receiver_id', 'numerical', 'integerOnly'=>true),
			array('subject', 'required'),
			array('subject', 'length', 'max'=>256),
			array('is_read', 'length', 'max'=>1),
			array('deleted_by', 'length', 'max'=>8),
			array('body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sender_id, receiver_id, subject, body, is_read, deleted_by, created_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.

		$module = Yii::app()->getModule('message');

		return array(
			'receiver' => $module->receiverRelation ? $module->receiverRelation : array(CActiveRecord::BELONGS_TO, $module->userModel, 'receiver_id'),
			'sender' => $module->senderRelation ? $module->senderRelation : array(CActiveRecord::BELONGS_TO, $module->userModel, 'sender_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sender_id' => 'Sender',
			'receiver_id' => 'Receiver',
			'subject' => t('Ämne'),
			'body' => t('Meddelande'),
			'is_read' => 'Is Read',
			'deleted_by' => 'Deleted By',
			'created_at' => 'Created At',
		);
	}

    /**
     * @return bool
     */
    protected function beforeSave()
	{
		if($this->isNewRecord) {
			if ($this->hasAttribute('created_at')) {
			    $this->created_at = Date('Y-m-d H:i:s');
			}
		}
		return parent::beforeSave();
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sender_id',$this->sender_id);
		$criteria->compare('receiver_id',$this->receiver_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('is_read',$this->is_read,true);
		$criteria->compare('deleted_by',$this->deleted_by,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return mixed
     */
    public function getSenderName() {
		if ($this->sender) {
		    return call_user_func(array($this->sender, Yii::app()->getModule('message')->getNameMethod));
		}
	}

    /**
     * @return mixed
     */
    public function getReceiverName() {
		if ($this->receiver) {
		    return call_user_func(array($this->receiver, Yii::app()->getModule('message')->getNameMethod));
		}
	}

    /**
     * @param $userOne , any user ID in a publicerare/rekryterare pair
     * @param $userTwo , same as above
     *
     * @return the message object
     */
    public static function getFirstMessageTitle($userOne,$userTwo){
        //hämta ut de två användarna från databasen
        $userOne = User::model()->findByPk($userOne);
        $userTwo = User::model()->findByPk($userTwo);
        //skapa ett kriteria object för att kunna filtrera sökningen efter meddelandet
        $c = new CDbCriteria();
        //bara en recruiter kan ha startat en konversation (och därmed första meddelandet...) så kolla vem av användarna som är rekryteraren
        if($userTwo->recruiter){
           $senderId = $userTwo->id;
           $receiverId = $userOne->id;
        }elseif($userOne->recruiter){
            $senderId = $userOne->id;
            $receiverId = $userTwo->id;
        }
        //kräv att meddelandet är mellan de två användare vi hämtat
        $c->compare("sender_id",$senderId);
        $c->compare("receiver_id",$receiverId);
        //hämta max 1 ur databasen
        $c->limit =1;
        $c->order ="created_at";
        $message = Message::model()->find($c);
        return $message;
    }

    /**
     * @param $userId
     *
     * @return CActiveDataProvider
     */
    public static function getAdapterForInbox($userId) {
		$c = new CDbCriteria();
		$c->addCondition ('t.recruiterId = :userId',"OR");
		$c->addCondition ('t.publisherId = :userId',"OR");
//		$c->addCondition('t.deleted_by <> :deleted_by_receiver OR t.deleted_by IS NULL');
		$c->order = 't.date DESC';
		$c->params = array(
			'userId' => $userId,
			'deleted_by_receiver' => Message::DELETED_BY_RECEIVER,
		);
        $c->limit = 1;
		$messagesProvider = new CActiveDataProvider('Conversation', array('criteria' => $c));
		return $messagesProvider;
	}

    /**
     * @param $userId
     *
     * @return CActiveDataProvider
     */public static function getAdapterForSent($userId) {
		$c = new CDbCriteria();
		$c->addCondition('t.sender_id = :senderId');
		$c->addCondition('t.deleted_by <> :deleted_by_sender OR t.deleted_by IS NULL');
		$c->order = 't.created_at DESC';
		$c->params = array(
			'senderId' => $userId,
			'deleted_by_sender' => Message::DELETED_BY_SENDER,
		);
		$messagesProvider = new CActiveDataProvider('Message', array('criteria' => $c));
		return $messagesProvider;
	}

    /**
     * @param $userId
     *
     * @return CActiveDataProvider
     */public static function getAdapterForHistory($userId) {

		$c = new CDbCriteria();
		$c->addCondition('sender_id = :senderId AND receiver_id = :receiverId');
//		$c->addCondition('receiver_id = :receiverId OR receiver_id = :senderId');
		$c->addCondition('t.deleted_by = :deleted_by_sender OR t.deleted_by IS NULL OR t.deleted_by = :deleted_by_receiver');
		$c->order = 'created_at';
		$c->params = array(
			'senderId' => $userId,
			'receiverId' => Yii::app()->user->id,
			'deleted_by_sender' => Message::DELETED_BY_SENDER,
			'deleted_by_receiver' => Message::DELETED_BY_RECEIVER,
		);
		$messagesProvider = new CActiveDataProvider('Message', array('criteria' => $c));
		return $messagesProvider;
	}

    /**
     * @param $userId
     *
     * @return bool
     */public function deleteByUser($userId) {

		if (!$userId) {
			return false;
		}

		if ($this->sender_id == $this->receiver_id && $this->receiver_id == $userId) {
			$this->delete();
			return true;
		}

		if ($this->sender_id == $userId) {
			if ($this->deleted_by == self::DELETED_BY_RECEIVER) {
				$this->delete();
			} else {
				$this->deleted_by = self::DELETED_BY_SENDER;
				$this->save(false);
			}

			return true;
		}

		if ($this->receiver_id == $userId) {
			if ($this->deleted_by == self::DELETED_BY_SENDER) {
				$this->delete();
			} else {
				$this->deleted_by = self::DELETED_BY_RECEIVER;
				$this->save(false);
			}

			return true;
		}

		// message was not deleted
		return false;
	}

    /**
     *
     */
    public function markAsRead() {
		if (!$this->is_read) {
			$this->is_read = true;
			$this->save();
		}
	}

    /**
     * @param $userId
     *
     * @return string
     */public function getCountUnreaded($userId) {
		if (!$this->unreadMessagesCount) {
			$c = new CDbCriteria();
			$c->addCondition('receiver_id = :receiverId');
			$c->addCondition('deleted_by <> :deleted_by_receiver OR t.deleted_by IS NULL');
			$c->addCondition('is_read = "0"');
			$c->params = array(
				'receiverId' => $userId,
				'deleted_by_receiver' => Message::DELETED_BY_RECEIVER,
			);
			$count = self::model()->count($c);
			$this->unreadMessagesCount = $count;
		}

		return $this->unreadMessagesCount;
	}

    /**
     * @param $userId
     *
     * @return CActiveRecord[]
     */public function getUnreadMessages($userId) {


		$c = new CDbCriteria();
		$c->addCondition('t.receiver_id = :receiverId');
		$c->addCondition('t.deleted_by <> :deleted_by_receiver OR t.deleted_by IS NULL');
		$c->addCondition('t.is_read = "0"');
		$c->params = array(
			'receiverId' => $userId,
			'deleted_by_receiver' => Message::DELETED_BY_RECEIVER,
			);
		$messages = self::model()->findAll($c);
		

		return $messages;
	}
}
