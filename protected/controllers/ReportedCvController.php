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
			throw new CHttpException(401,t('Behörighet saknas.'));
		}
	}

	public function actionCreate(){
		$CV = new ReportedCv;	
		$CV->cvId = $_POST['cvID'];
		$CV->reason = $_POST['reason'];
		$CV->reportedBy = $_POST['userID'];
		echo $CV->save();
	}

	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request			
			$ReportedRemove = ReportedCv::model()->findByPk($id);
			$ReportedRemove->delete();
		} else {
			throw new CHttpException(400,t('Ogiltig begäran.'));
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