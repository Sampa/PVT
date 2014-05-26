<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','statistics'),
				'users'=>array('*'),
				),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
				),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
				),
			);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(Yii::app()->user->id ==$id){

			$rmodel=Recruiter::model()->findByPk($id);
			$this->render('view',array(
				'model'=>$this->loadModel($id),
				'rmodel'=>$rmodel
				));
		} else{
			throw new CHttpException(400,t('Ogiltig begäran.'));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes=$_POST['User'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if(Yii::app()->user->id ==$id){
			$model=$this->loadModel($id);
			$rmodel=Recruiter::model()->findByPk($id);

			// Uncomment the following line if AJAX validation is needed

			if($rmodel){
				$this->performAjaxValidation($model, $rmodel);
			}
			else{
				$this->performAjaxValidationSingle($model);
			}

			if (isset($_POST['User'])){
				if($_POST['User']['username']!==''){
					$model->username = $_POST['User']['username'];
				}
				if($_POST['User']['name']!==''){				
					$model->name = $_POST['User']['name'];				
				}
				if($_POST['User']['email']!==''){
					$model->email = $_POST['User']['email'];
				}
				if($_POST['User']['new_password']===$_POST['User']['password_confirm']){
					$model ->password = $_POST['User']['new_password'];
				}
				$model->notify = $_POST['User']['notify'];
				if(!$rmodel){
					if ($model->save()) {
						$this->redirect(array('view','id'=>$model->id));
					}
				}
			}

			if(isset($_POST['Recruiter'])){
				if($_POST['Recruiter']['orgName']!==''){
					$rmodel->orgName =$_POST['Recruiter']['orgName'];
				}
				if($_POST['Recruiter']['VAT']!==''){
					$rmodel->VAT = $_POST['Recruiter']['VAT'];
				}
				if ($rmodel->save() && $model->save()){
					$this->redirect(array('view','id'=>$model->id));
				}
			}

			$this->render('update',array(
				'model'=>$model,
				'rmodel'=>$rmodel,
				));
		}
		else{
			throw new CHttpException(400,t('Ogiltig begäran'));
		}
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,t('Ogiltig begäran'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->id ==1){
			$dataProvider=new CActiveDataProvider('User');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				));
		}
		else{
			throw new CHttpException(400,t('Ogiltig begäran'));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		if (Yii::app()->user->id == 1){
			$model=new User('search');
			$model->unsetAttributes();  // clear any default values
			if (isset($_GET['User'])) {
				$model->attributes=$_GET['User'];
			}

			$this->render('admin',array(
				'model'=>$model,
				));
		}
		else{
			throw new CHttpException(400,t('Ogiltig begäran'));
		}
	}

	public function actionStatistics()
	{
		if (Yii::app()->user->id == 1){

			$dataProvider = new CActiveDataProvider('User');
			$dataProviderRecruiter = new CActiveDataProvider('Recruiter');
			$dataProviderCv = new CActiveDataProvider('Cv');

			$criteria = new CDbCriteria;
			$criteria->compare('login_date', date('Y-m-d'));
			$dataProviderUsersToday['user'] = User::model()->findAll($criteria);
			$criteria->addCondition('recruiter.userId IS NOT NULL');
			$dataProviderUsersToday['recruiter'] = User::model()->with("recruiter")->findAll($criteria);


			$dataProviderRecProcessSuccesful = new CActiveDataProvider('Recruitmentprocess',array(

				'countCriteria'=>array(
					'condition'=>'successfulProcess="CandidateFoundOp"',
					)
				));
			$dataProviderRecProcessOther = new CActiveDataProvider('Recruitmentprocess',array(
				'countCriteria'=>array(
					'condition'=>'successfulProcess="OtherOpFound"',
					)
				));
			$dataProviderRecProcessFailed = new CActiveDataProvider('Recruitmentprocess',array(
				'countCriteria'=>array(
					'condition'=>'successfulProcess="NoCandidateFoundOp"',
					)
				));

			$this->render('statistics',array(
				'dataProvider'=>$dataProvider,
				'dataProviderRecruiter' =>$dataProviderRecruiter,
				'dataProviderCv'=>$dataProviderCv,
				'dataProviderUsersToday'=>$dataProviderUsersToday,
				'dataProviderRecProcessSuccesful'=>$dataProviderRecProcessSuccesful,
				'dataProviderRecProcessOther'=>$dataProviderRecProcessOther,
				'dataProviderRecProcessFailed'=>$dataProviderRecProcessFailed,
				));
		}else {
			throw new CHttpException(400,t('Ogiltig begäran'));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,t('Sidan existerar inte'));
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidationSingle($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
			echo CActiveForm::validate(array($model));
			Yii::app()->end();
		}
	}
	protected function performAjaxValidation($model, $rmodel)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
			echo CActiveForm::validate(array($model, $rmodel));
			Yii::app()->end();
		}
	}
}