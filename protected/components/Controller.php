<?php
/**
 * Controller.php  class file.
 *
 * @author Spiros Kabasakalis <kabasakalis@gmail.com>
 * @copyright Copyright &copy; Spiros Kabasakalis 2013-
 * @link  InfoWebSphere,http://iws.kabasakalis.gr
 * @link  YiiLab,http://yiilab.kabasakalis.tk
 * @link  Github https://github.com/drumaddict
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package
 * @version 2.0.0
 */

class Controller extends CController
{
    public function  init()
    {
        parent::init();
        $app = Yii::app();
        if (isset($_POST['_lang']))
        {
            $app->language = $_POST['_lang'];
            $app->session['_lang'] = $app->language;
        }
        else if (isset($app->session['_lang']))
        {
            $app->language = $app->session['_lang'];
        }
        $app->language = "sv";
        if (app()->params->render_switch_form) {
            $this->getLayoutAndBootswatchSkinFromSession();
            $this->handleSwitchForm();
        }
        $this->registerJs();
        $this->registerCss();
        //If no theme is specified in config/main,bootstrap3 assets are registered
        //if theme is bootstrap2,bootstrap assets are registered by yiistrap in themes/bootstrap2/layouts/main.php
        if (!app()->theme)
            $this->registerBootstrap3CoreAssets();
    }
    /*
     * Returns true or false depending on the logged in users role
     */
    public function isRecruiter(){
        return (Yii::app()->user->getState("role") == "recruiter")? true:false;
    }
    /*
     * Returns true or false depending on the logged in users role
     */
    public function isPublisher(){
        return (Yii::app()->user->getState("role") == "publisher")? true:false;
    }
    public function getLayoutAndBootswatchSkinFromSession()
    {
        //if we haven't submitted the switch form,grab layout and bootswatch skin from session.
        if (!isset($_POST['layout'])) {
            if (isset(app()->session['layout']))
                app()->layout = app()->session['layout'];
            if (isset(app()->session['bootswatch3_skin']))
                app()->params->bootswatch3_skin = app()->session['bootswatch3_skin'];
        }
    }

    public function handleSwitchForm()
    {

        if (isset($_POST['layout'])) {
            app()->layout = $_POST['layout'];
            app()->params->bootswatch3_skin = $_POST['bootswatch_skin'];
            //also store in session
            app()->session['layout'] = app()->layout;
            app()->session['bootswatch3_skin'] = app()->params->bootswatch3_skin;
        }
    }


    public function registerJs()
    {

        cs()->registerScriptFile(bu() . '/libs/jquery/jquery.min.js', CClientScript::POS_BEGIN);
        cs()->registerScriptFile(bu() . '/libs/jquery/jquery-ui.min.js', CClientScript::POS_BEGIN);
        cs()->registerScriptFile(bu() . '/js/plugins.js', CClientScript::POS_END);
        cs()->registerScriptFile(bu() . '/js/main.js', CClientScript::POS_END);
        cs()->registerScriptFile(bu() . '/js/select2.min.js', CClientScript::POS_END);
        cs()->registerScriptFile(bu() . '/js/select2_locale_sv.js', CClientScript::POS_END);
        cs()->registerScriptFile(bu() . '/js/bootstro.js', CClientScript::POS_END);
        cs()->registerScriptFile(bu() . '/js/bootbox.min.js', CClientScript::POS_END);
    }

    //custom application css
    public function registerCss()
    {
        cs()->registerCssFile(bu() . '/css/main.css');
        cs()->registerCssFile(bu() . '/css/select2.css');
        cs()->registerCssFile(bu() . '/css/bootstro.css');
        cs()->registerCssFile(bu() . '/libs/jquery/jquery-ui.min.css');
    }


    public function getBootstrap3LayoutCssFileURL()
    {
        return bu() . '/libs/bootstrap/examples/' . app()->layout . '/' . app()->layout . '.css';
    }

    public function getBootstrap2LayoutCssFileURL()
    {
        return bu() . '/yiistrap_assets/layouts/' . app()->layout . '.css';
    }

    //Choose a bootswatch skin optionally
    // Setting the bootswatch3_skin parameter in main/config.php. bootswatch3_skin=>'none',
    //will render the default bootstrap css file.
    public function registerBootstrap3CoreAssets()
    {

        //bootstrap css
        (app()->params['bootswatch3_skin'] == "none") ?
            cs()->registerCssFile(bu() . '/libs/bootstrap/dist/css/bootstrap.min.css') :
            cs()->registerCssFile(bu() . '/libs/bootswatch/' . app()->params['bootswatch3_skin'] . '/bootstrap.min.css');

        //bootstrap js
        cs()->registerScriptFile(bu() . '/libs/bootstrap/dist/js/bootstrap.min.js', CClientScript::POS_END);
    }


    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    //  public $layout = '//layouts/column1';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
}