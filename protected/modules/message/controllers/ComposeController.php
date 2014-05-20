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
			if ($message->save()) {
				Yii::app()->user->setFlash('messageModule', t("Meddelandet har skickats"));
				$this->redirect($this->createUrl('inbox/'));
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
