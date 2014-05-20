<?php

class ViewController extends Controller {

	public $defaultAction = 'view';

	public function actionView($id) {
		$userId = Yii::app()->user->getId();
		$otherUserId = $id;
		$criteria = new CDbCriteria;
		$criteria->compare("receiver_id",$userId,false,"AND");
//		$criteria->compare("receiver_id",$otherUserId,false,"AND");
//		$criteria->compare("sender_id",$userId,false,"OR");
		$criteria->compare("sender_id",$otherUserId,false);
		$criteria->limit = 1;
		$viewedMessage = Message::model()->find($criteria);
		if (!$otherUserId || !$viewedMessage) {
			 throw new CHttpException(404, t('Sidan du sökte kunde inte hittas'));
		}
		if ($viewedMessage->sender_id != $userId && $viewedMessage->receiver_id != $userId) {
		    throw new CHttpException(403, MessageModule::t('You can not view this message'));
		}
		if (($viewedMessage->sender_id == $userId && $viewedMessage->deleted_by == Message::DELETED_BY_SENDER)
		    || $viewedMessage->receiver_id == $userId && $viewedMessage->deleted_by == Message::DELETED_BY_RECEIVER) {
		    throw new CHttpException(404, MessageModule::t('Message not found'));
		}
		$message = new Message();
		$isIncomeMessage = $viewedMessage->receiver_id == $userId;
		if ($isIncomeMessage) {
		//	$viewedMessage->markAsRead();
		}
		$this->render(Yii::app()->getModule('message')->viewPath . '/view', array('viewedMessage' => $viewedMessage, 'message' => $message,'otherUserId'=>$otherUserId));
	}

}
