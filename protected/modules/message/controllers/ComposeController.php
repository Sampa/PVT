<?php

class ComposeController extends Controller
{

	public $defaultAction = 'compose';

	public function actionCompose($id = null) {
		$message = new Message();
        $this->performAjaxValidation($message);
		if (Yii::app()->request->getPost('Message')) {
			$receiverName = Yii::app()->request->getPost('receiver');
		    $message->attributes = Yii::app()->request->getPost('Message');
			$message->sender_id = Yii::app()->user->getId();
			if ($message->save()) {
				Yii::app()->user->setFlash('messageModule', MessageModule::t('Message has been sent'));
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
		$this->render(Yii::app()->getModule('message')->viewPath . '/compose', array('model' => $message, 'receiverName' => isset($receiverName) ? $receiverName : null));
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
