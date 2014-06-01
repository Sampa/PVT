<?php

class ConversationController extends Controller
{

	public $defaultAction = 'Conversation';

	public function actionConversation($id = null) {
		$message = new Message();
        $this->performAjaxValidation($message);
		if (Yii::app()->request->isAjaxRequest) {
			$receiverName = Yii::app()->request->getPost('receiver');
		    $message->body= Yii::app()->request->getPost('body');
		    $message->receiver_id= Yii::app()->request->getPost('receiver_id');
			$message->sender_id = Yii::app()->user->id;
			$message->subject = "chat";
			if ($message->validate()) {

                $con = Conversation::model()->findByPk(1);
                if($con ==null){
                    $con= new Conversation();
                    $con->recruiterId = user()->id;
                    $con->publisherId = $message->receiver_id;
                    $con->title = $message->subject;
                    $con->save();
                }
                $message->conversationId = $con->id;
                $message->save();
                Yii::app()->user->setFlash('messageModule', MessageModule::t('Message has been sent'));
				$messageView = $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_sentTemplate',array("message"=>$message),true);
				echo json_encode(array("success"=>true,"message"=>$messageView,"messageId"=>$message->id));
			} else if ($message->hasErrors('receiver_id')) {
				$message->receiver_id = null;
				$receiverName = '';
				echo json_encode(array("success"=>false));
			}
			Yii::app()->end();
		} else {
			if ($id) {
				$receiver = call_user_func(array(call_user_func(array(Yii::app()->getModule('message')->userModel, 'model')), 'findByPk'), $id);
				if ($receiver) {
					$receiverName = call_user_func(array($receiver, Yii::app()->getModule('message')->getNameMethod));
					$message->receiver_id = $receiver->id;
				}
			}
		}
		$this->render(Yii::app()->getModule('message')->viewPath . '/conversation', array(
			'inboxAdapter'=>$this->getInboxAdapter(),
			'conversation'=>$this->getConversation(),
			'sent'=>$this->getSentContent(),
            'surveys'=>$this->getSurveys(),
            'answeredSurveys'=>$this->getAnsweredSurveys(),
            'answeredSurveysForRecruiter'=>$this->getAnsweredSurveysForRecruiter(),
			'model' => $message,
			'receiverName' => isset($receiverName) ? $receiverName : null));
	}
    public function getConversation(){
        $model = $this->loadModel(1);
        return $this->renderPartial(Yii::app()->getModule('message')->viewPathConversation . '/view', array(
            'model' => $model
        ),true);
    }
    public function getInboxAdapter() {
        $messagesAdapter = Message::getAdapterForInbox(Yii::app()->user->getId());
        $pager = new CPagination($messagesAdapter->totalItemCount);
        $pager->pageSize = 10;
        $messagesAdapter->setPagination($pager);

        return $messagesAdapter;
    }
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }
	public function getSentContent() {
		$messagesAdapter = Message::getAdapterForSent(Yii::app()->user->getId());
		$pager = new CPagination($messagesAdapter->totalItemCount);
		$pager->pageSize = 10;
		$messagesAdapter->setPagination($pager);

		return $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/sent', array(
			'messagesAdapter' => $messagesAdapter
		),true);
	}
    public function getSurveys(){
        $criteria = new CDbCriteria;
        $criteria->compare("userId",Yii::app()->user->id);
        $criteria->compare( "answered",0);
        $criteria->order = "survey.date";
        $allForThisArea = SurveyCandidate::model()->with("survey")->findAll($criteria);
        return $allForThisArea;
    }
    public function getAnsweredSurveys(){
        $criteria = new CDbCriteria;
        $criteria->compare("userId",Yii::app()->user->id);
        $criteria->compare( "answered",1);
        $allForThisArea = SurveyCandidate::model()->findAll($criteria);
        return $allForThisArea;
    }
    public function getAnsweredSurveysForRecruiter(){
        $criteria = new CDbCriteria;
        $criteria->compare("recruiterId",Yii::app()->user->id);
        $criteria->compare( "surveyCandidates.answered",1);
        $allForThisArea = Survey::model()->with("surveyCandidates")->findAll($criteria);
        return $allForThisArea;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Conversation the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Conversation::model()->findByPk($id);
        if ($model===null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cv $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax']==='message-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
