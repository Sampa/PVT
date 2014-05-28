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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete','sendOutSurveys'),
				'expression'=>'(( User::model()->findByPk(Yii::app()->user->id) != null && User::model()->findByPk(Yii::app()->user->id)->isRecruiter() ))',
			),
			array('allow', // allow authed users to perform 'respond' actions
				'actions'=>array('respond'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    public function actionRespond($id=null){
        if(Yii::app()->request->isPostRequest){
            foreach($_POST['SurveyForm'] as $question=>$answer){
                if(is_array($answer))
                    $answer = $answer[0];
                $criteria = new CDbCriteria();
                $criteria->compare("id",$question);
                $surveyQuestion = SurveyQuestion::model()->find($criteria);
                if($surveyQuestion){
                    $surveyCandidateCriteria = new CDbCriteria();
                    $surveyCandidateCriteria->compare("userID",user()->id);
                    $surveyCandidateCriteria->compare("surveyID",$_POST['SurveyForm']['surveyId']);
                    $surveyCandidate = SurveyCandidate::model()->find($surveyCandidateCriteria);
                    $surveyCandidate->answered = 1;
                    $surveyCandidate->save();
                    
                    $surveyAnswer = new SurveyAnswer;
                    $surveyAnswer->surveyQuestionID = $surveyQuestion->id;
                    $surveyAnswer->questionAnswer = $answer;
                    $surveyAnswer->answeredBy = $surveyCandidate->userID;
                    $surveyAnswer->save();
                }
            }
            $this->redirect("/message");
        }else{
            $model = $this->loadModel($id);
        }
        $this->render("survey_respond",array("survey"=>$model));
    }
	public function actionSendOutSurveys(){

		$survey = Survey::model()->findByPk($_POST['surveyId']);
		if(!$survey){
			echo json_encode(array("status"=>"fail","message"=>t("Välj en enkät att skicka ut till dina valda CV:n")));
			return;
		}
		if(isset($_POST['ids'])){
			foreach($_POST['ids'] as $key=>$id){
				$cv = Cv::model()->findByPk($id);
				$candida    teForSurvey= new SurveyCandidate;
				$candidateForSurvey->userID =$cv->publisherId;
				$candidateForSurvey->surveyID=$survey->id;
				$candidateForSurvey->answered=0;
				$candidateForSurvey->save();
			};
			echo json_encode(array("status"=>"success","message"=>t("Din enkät är skickad")));
		}else{
			echo json_encode(array("status"=>"fail","message"=> t("Välj minst ett CV att skicka din enkät till")));
		}

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
		if (app()->request->isAjaxRequest) {
            var_dump($_POST["questions"]);
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
					$question->type = $data['type'];
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
        $criteria = new CDbCriteria();
        $criteria->compare("recruiterId",user()->id);
        $criteria->order = "date DESC";
		$allModels = Survey::model()->findAll($criteria);
		$dataProvider=new CActiveDataProvider('Survey');
		$this->render('admin',array(
			'dataProvider'=>$dataProvider,
			'allModels'=>$allModels
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