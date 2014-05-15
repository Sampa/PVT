<?php

class ReportedCvController extends Controller
{
	public function actionIndex()
	{
		if(yii::app()->user->Id == 1){
			$allModels=ReportedCv::model()->findAll();
			$dataProvider=new CActiveDataProvider('ReportedCv');
			
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'allModels'=>$allModels
				));
		}
		else{
			throw new CHttpException(401,'Unauthorized request. Please do not repeat this request again.');
		}
	}

	public static function actionCreate($cv, $reason){
		$model = new reportedCv;
		$model->cvId = $cv->id;
		$model->reason = $reason;
		$model->reportedBy=Yii::app()->user->id;
		if($model->save()){
		}
	}

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			
			$ReportedRemove=ReportedCv::model()->findAll("cvId=".$id);
			foreach ($ReportedRemove as $deletecv){
				$deletecv->delete();
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}