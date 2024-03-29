<?php

class RecruitmentprocessController extends Controller
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
				'actions'=>array('index','view','savecv'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','commentUpdate'),
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
		$process = $this->loadModel($id);

		if($process->recruiterId == Yii::app()->user->id){

			$criteria=new CDbCriteria;
			$criteria->compare('rpId', $id);

			$dataProvider = new CActiveDataProvider('Hotlist', array(
    			'criteria'=>$criteria,
    		));

			$this->render('view',array(
				'model'=>$process,
				'dataProvider'=>$dataProvider,
				));
		}
		else{
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Recruitmentprocess;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if (isset($_POST['Recruitmentprocess'])) {
            if(isset($_POST['geoRegion']) && isset($_POST['geoCity']) && $_POST['countries'] != "default"){
                $geo = new GeograficArea;
                $geo->region  = $_POST['geoRegion'];
                $geo->country  = $_POST['countries'];
                $geo->city = $_POST['geoCity'];
                if($geo->save()){
                    $model->geographicAreaID  = $geo->id;
                }
            }
			$model->attributes = $_POST['Recruitmentprocess'];
			$model->company = $_POST['Recruitmentprocess']['company'];
			$model->recruiterId = Yii::app()->user->id;
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
	public function actionUpdate()
	{
		$processID = $_POST["id"];

		$model=$this->loadModel($processID);

		$model->endDate = date("Y-m-d");
		$model->salaryOfHired = $_POST["salaryId"];
		$model->successfulProcess = $_POST["radioId"];

		$this->performAjaxValidation($model);

		if ($model->save()) {
			echo "Vi lyckades spara processen";
		} else {
			echo "Vi lyckades inte";
		}
	}
	public function actionCommentUpdate()
	{
		$processID = $_POST["recId"];

		$model=$this->loadModel($processID);

		$model->commentArea = $_POST['comment'];
		
		$model->save(false);
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
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->getState("role")== "recruiter"){
			$allModels = Recruitmentprocess::model()->findAll();
			$dataProvider=new CActiveDataProvider('Recruitmentprocess');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'allModels'=>$allModels
				));
		}else{
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');	
		}
	}

	/**
	* Används för att spara ett cv till en hotlist
	*/
	public function actionSavecv()
	{
		$hasOld = Hotlist::model()->findByAttributes(array("cvId"=>$_POST['cvID'], "rpId"=>$_POST['processID']));
		if(isset($hasOld)) {
			echo "Du har sparat detta cv tidigare!";
			return;
		} else { 
			$hotlist = new Hotlist;	
			$hotlist->cvId = $_POST['cvID'];
			$hotlist->rpId = $_POST['processID'];
            $recruitmentProcess = Recruitmentprocess::model()->findByPk($_POST['processID']);
            if(!$recruitmentProcess)
                die();
            $recruitmentProcessName = $recruitmentProcess->title;
			if($hotlist->save()) {
				echo "Vi har nu sparat CVt i din process ".$recruitmentProcessName."!";
			}
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Recruitmentprocess('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Recruitmentprocess'])) {
			$model->attributes=$_GET['Recruitmentprocess'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Recruitmentprocess the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Recruitmentprocess::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Recruitmentprocess $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='recruitmentprocess-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}