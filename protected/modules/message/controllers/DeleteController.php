<?php

class DeleteController extends Controller {

	public $defaultAction = 'delete';

	public function actionDelete($id = null) {

		if (!$id) {
			$messagesData = Yii::app()->request->getParam('Message');
			$conversation = Yii::app()->request->getParam('Conversation');
			$counter = 0;
			if ($messagesData) {
				foreach ($messagesData as $messageData) {
					if (isset($messageData['selected'])) {

                            $message = Conversation::model()->findByPk($conversation);
                            if ($message->delete()) {
                                $counter++;
                            }
					}
				}
			}
			if ($counter) {
				Yii::app()->user->setFlash('messageModule', MessageModule::t('{count} message'.($counter > 1 ? 's' : '').' has been deleted', array('{count}' => $counter)));
			}
			$this->redirect(Yii::app()->request->getUrlReferrer());
		} else {
			$message = Message::model()->findByPk($id);

			if (!$message) {
				throw new CHttpException(404, MessageModule::t('Message not found'));
			}

			$folder = $message->receiver_id == Yii::app()->user->getId() ? 'inbox/' : 'sent/';

			if ($message->deleteByUser(Yii::app()->user->getId())) {
				Yii::app()->user->setFlash('messageModule', MessageModule::t('Message has been deleted'));
			}
			$this->redirect($this->createUrl($folder));
		}
	}
}
