<?php

class SurveyController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','sendOutSurveys'),
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
    public function actionSendOutSurveys(){
        $survey = Survey::model()->findByPk($_POST['surveyId']);
        foreach($_POST['ids'] as $key=>$id){
            $cv = Cv::model()->findByPk($id);

        };
    }
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$survey=new Survey;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($survey);

		if (app()->request->isAjaxRequest) {
//			var_export($_POST);
			$survey->recruiterID = Yii::app()->user->id;
			$survey->title = $_POST['title'];
			$message = array(
				'survey'=>false,
				'questions'=>false,
				'options'=>true,
			);
			if ($survey->save(false)) {
				$message['survey'] = true;
				foreach($_POST['questions'] as $index=>$data){
					$question = new SurveyQuestion;
					$question->surveyID = $survey->id;
					$question->question = $data['question'];
					if(isset($data['options'])){
						$question->haveOptions = 1;
					}else{
						$question->haveOptions = 0;
					}

					if($data['type']=="checkbox"){
						$question->allowMultipleChoice = 1;
					}else{
						$question->allowMultipleChoice =0;
					}
					if($question->save()){
						$message['questions'] = true;
						if($question->haveOptions === 1){
							foreach($data['options'] as $index=>$text){
								$questionOption = new SurveyQuestionOption;
								$questionOption->questionId = $question->id;
								$questionOption->text = $text;
								if(!$questionOption->save()){ //kunde ej spara ett option
									$message['options'] = false;
								};
							}
						}//slut if haveOptions
					}else{ //någon fråga kunde ej sparas
						$message['questions'] = false;
					}

				}
			}
			$success = true;
			foreach($message as $key=>$boolean){
				if(!$boolean)
					$success = false;
			}
			echo json_encode(array('success'=>$success,'message'=>$message,'title'=>$survey->title));
			return;
		}

		$this->render('create',array(
			'model'=>$survey,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Survey'])) {
			$model->attributes=$_POST['Survey'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
			$model = $this->loadModel($id);
            foreach($model->surveyQuestions as $key=>$question){
                $question->delete();
            }
            $model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,t('Ogiltig begäran.'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Survey');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Survey('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Survey'])) {
			$model->attributes=$_GET['Survey'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Survey the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Survey::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,t('Sidan existerar inte.'));
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Survey $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='survey-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}