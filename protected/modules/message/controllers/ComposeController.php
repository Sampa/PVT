<?php

class ComposeController extends Controller
{

	public $defaultAction = 'compose';

	public function actionCompose($id = null) {

        if(Yii::app()->user->getState("role")== "publisher"){
            throw new CHttpException(404, t('Sidan kunde inte hittas'));
        }
		$message = new Message("compose");
		$this->performAjaxValidation($message);
		if (Yii::app()->request->getPost('Message')) {
			$receiverName = Yii::app()->request->getPost('receiver');
			$message->attributes = Yii::app()->request->getPost('Message');
			$message->sender_id = Yii::app()->user->getId();
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
				Yii::app()->user->setFlash('messageModule', t("Meddelandet har skickats"));

                sendHtmlEmail(
                    $message->receiver->email,
                    "Cv-Pages",
                    "no-reply@cvpages.se",
                    t("Cv-Pages: En rekryterare har startat en konversation med dig"),
                    array(
                        'username' => $message->getReceiverName(),
                    ),
                    'notifier',
                    'main3'
                );
                $this->redirect($this->createUrl('message/'));
			} else if ($message->hasErrors('receiver_id')) {
				$message->receiver_id = null;
				$receiverName = '';
			}
		} else {
			if ($id) {
				$receiver = call_user_func(array(call_user_func(array(Yii::app()->getModule('message')->userModel, 'model')), 'findByPk'), $id);
				if ($receiver) {
					$receiverName = call_user_func(array($receiver, Yii::app()->getModule('message')->getNameMethod));
					$message->receiver_id = $receiver->id;
				}
			}
		}
		$this->render(Yii::app()->getModule('message')->viewPath . '/compose', array('inbox'=>$this->getInboxContent(),'model' => $message, 'receiverName' => isset($receiverName) ? $receiverName : null));
	}
    public function getInboxContent() {
        $messagesAdapter = Message::getAdapterForInbox(Yii::app()->user->getId());
        $pager = new CPagination($messagesAdapter->totalItemCount);
        $pager->pageSize = 10;
        $messagesAdapter->setPagination($pager);

        return $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/inbox', array(
            'messagesAdapter' => $messagesAdapter
        ),true);
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
