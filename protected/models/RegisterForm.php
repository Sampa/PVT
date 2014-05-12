<?php
/**
 * RegisterForm.php
 *
 * @author: spiros kabasakalis <kabasakalis@gmail.com>
 * Date: 11/15/12
 * Time: 22:46 PM
 */
class RegisterForm extends CFormModel
{
    public $fullname;
    public $username;
    public $email;
    public $new_password;
    public $password_confirm;
    public $verify_code;
    public $other_checkbox;
    public $Companyname;
    public $VAT;
    public $accepted;


    public function rules()
    {
        return array(
            array('fullname,email,new_password,password_confirm,username', 'required'),
            array('email,new_password,password_confirm,username', 'required'),
            array('accepted','required', 'requiredValue' => 1, 'message' =>Yii::t("t",'Acceptera användaravtalet')),
            array('username', 'match', 'allowEmpty' => false, 'pattern' => '/[A-Za-z0-9\x80-\xFF]+$/'),
            array('email', 'email'),
            array('email', 'length', 'min' => User::EMAIL_MIN, 'max' => User::EMAIL_MAX),
            array('new_password,password_confirm', 'length', 'min' => User::PASSWORD_MIN, 'max' => User::PASSWORD_MAX),
            array('username', 'length', 'min' => User::USERNAME_MIN, 'max' => User::USERNAME_MAX),
            array('username,email', 'unique', 'className' => 'User', 'skipOnError' => false),
            array('password_confirm', 'compare', 'compareAttribute' => 'new_password'),
//           array('verify_code','application.extensions.recaptcha.EReCaptchaValidator','privateKey'=>Yii::app()->params['recaptcha_private_key']),
        //   array('verify_code', 'captcha'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'fullname' => Yii::t('t','Fullständigt namn'),
            'username' => Yii::t('t', 'Användarnamn'),
            'email' => Yii::t('t', 'E-post'),
            'new_password' => Yii::t('t', 'Lösenord'),
            'password_confirm' => Yii::t('t', 'Bekräfta lösenordet'),
            'verify_code' => Yii::t('t', 'Captcha'),
            'other_checkbox' => Yii::t('t', "Kryssa i om du är rekryterare"),
            'Companyname' => Yii::t('t', "Företagsnamn"),
            'VAT' => Yii::t('t', "VAT"),
            'accepted' => Yii::t('t','Acceptera användaravtal:'),
        );
    }
}