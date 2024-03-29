<?php
/**
 * User.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 11:42 PM
 *@author: spiros kabasakalis <kabasakalis@gmail.com>
  * Date: 11/15/12
  * Time: 22:46 PM
 */
/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $username
 *@property string $email
 * @property integer $status
 * @property string $password
 * @property string $password_strategy
 * @property string $salt
 * @property string $login_ip
 * @property integer $login_attempts
 * @property integer $login_time
 * @property string $activation_key
 * @property string $validation_key
 * @property boolean $requires_new_password
 * @property integer $create_time
 * @property integer $update_time

 */
class User extends CActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BANNED = 2;        //TODO
    const STATUS_REMOVED = 3;    //TODO

    //keep these in one place.
    const PASSWORD_MIN = 1;
    const PASSWORD_MAX = 50;
    const USERNAME_MIN = 3;
    const USERNAME_MAX = 45;
    const EMAIL_MAX = 125;
    const EMAIL_MIN = 5;


    /**
      * @var integer attribute active,inactive,banned,removed
      */
    public $status;
    public $name;
    /**
     * @var string attribute used for new passwords on user's edition
     */
    public $new_password;
    /**
     * @var string attribute used to confirmation fields
     */
    public $password_confirm;
    /**
     * @var isPublisher attribute used to distinguish publisher role from recruiter
     */
    public $isPublisher;
    /**
     * Returns the static model of the specified AR class.
     * @return Customer the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * Behaviors
     * @return array
     */
    public function behaviors()
    {
        Yii::import('application.extensions.passwordbehavior.*');
        return array(
            // Password behavior strategy
            "APasswordBehavior" => array(
                "class" => "APasswordBehavior",
                "defaultStrategyName" => "ahash",
                "strategies" => array(
                    "bcrypt" => array(
                        "class" => "ABcryptPasswordStrategy",
                        "workFactor" => 14,
                        "minLength" => self::PASSWORD_MIN
                    ),
                    "ahash" => array(
                                            "class" => "AHashPasswordStrategy",//for demo purposes
                                            "workFactor" => 14,
                                            "minLength" => self::PASSWORD_MIN
                                        ),
                    "legacy" => array(
                        "class" => "ALegacyMd5PasswordStrategy",
                        'minLength' => self::PASSWORD_MIN
                    )
                ),
            )
        );
    }

    /**
     * @return array validation rules for model attributes.
     */

    public function rules()
    	{

               //not using validation rules here because rules have already been applied  in LoginForm and RegisterForm
    		// NOTE: you should only define rules for those attributes that
    		// will receive user inputs.
    		return array(
    		/*	array('email', 'required'),
    			array('email', 'unique', 'on' => 'checkout', 'message' => Yii::t('validation', 'Email has already been taken.')),
    			array('email', 'email'),
    			array('newPassword, password_strategy ', 'length', 'max' => 50, 'min' => 8),
    			array('email, password, salt', 'length', 'max' => 255),
    			array('requires_new_password, login_attempts', 'numerical', 'integerOnly' => true),*/
    			// The following rule is used by search().
    			// Please remove those attributes that should not be searched.
            array('id, password, salt, password_strategy , requires_new_password , email', 'safe', 'on' => 'search'),
          array('password_confirm', 'compare', 'compareAttribute' => 'new_password', 'message' => Yii::t('validation', "Lösenorden matchar inte.")),
          array('username, email', 'unique'),
          array('username, name, email','required'),
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
          'recruiter' => array(self::HAS_ONE, 'Recruiter', 'userId'),
          'surveyAnswers' => array(self::HAS_MANY, 'SurveyAnswer', 'answeredBy'),
          'conversations' => array(self::HAS_MANY, 'Conversation', 'recruiterId'),
          'conversationsAsPublisher' => array(self::HAS_MANY, 'Conversation', 'publisherId')
        );
      }
  	public function getConversations(){
  		$c = new CDbCriteria();
  		$c->compare("recruiterId",user()->id,false,"OR");
  		$c->compare("publisherId",user()->id,false,"OR");
  		$c->order ="date";
  		$conversations = Conversation::model()->findAll($c);
  		return $conversations;
  	}

    public function getAnswersToSurvey($surveyId){
        $survey = Survey::model()->findByPk($surveyId);
        $criteria = new CDbCriteria();
//        $criteria->addInCondition("surveyQuestionID",$survey->surveyQuestions,"OR");
        $criteria->with = "surveyQuestion";
        $criteria->compare("answeredBy",$this->id);
        $criteria->compare("surveyQuestion.",$this->id);

        $answers = SurveyAnswer::model()->findAll($criteria);
        return $answers;
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => Yii::t('t', 'Användarnamn'),
            'password' => Yii::t('t', 'Password'),
            'new_password' => Yii::t('t', 'Nytt Lösenord'),
            'password_confirm' => Yii::t('t', 'Bekräfta lösenord'),
            'email' => Yii::t('t', 'Email'),
            'name' => Yii::t('t', 'Fullständigt namn'),
            'notify' => yii::t('t', 'Notifiera mig!'),
        );
    }

    /**
     * Helper property function
     * @return string the full name of the customer
     */
    public function getFullName()
    {

        return $this->username;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Makes sure usernames are lowercase
     * (emails by standard can have uppercase letters)
     * @return parent::beforeValidate
     */
    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->create_time = new CDbExpression('NOW()');
            $this->activation_key = $this->generate_activation_key();
        }

        $this->update_time = new CDbExpression('NOW()');
        $this->login_ip = getUserIP();

        if (!empty($this->username))
            $this->username = strtolower($this->username);

        return parent::beforeValidate();
    }


    /**
     * Generates a new validation key (additional security for cookie)
     */
    public function regenerateValidationKey()
    {
        $this->saveAttributes(array(
            'validation_key' => md5(mt_rand() . mt_rand() . mt_rand()),
        ));
    }


    /**
     * Generates a validation key for new registration or reset token for password reset.
     */
    public function  generate_activation_key()
    {
        return sha1(md5(microtime(true)) . $this->email . $this->password);
    }
	// class User

	public function getSuggest($q) {
		$c = new CDbCriteria();
		$c->addSearchCondition('name', $q, true, 'OR');
		$c->addSearchCondition('email', $q, true, 'OR');
		return $this->findAll($c);
	}
  public function isPublisher() {
    return Yii::app()->user->getState("role") == "publisher";
  }
  public function isRecruiter() {
    return Yii::app()->user->getState("role")== "recruiter";
  }
}
