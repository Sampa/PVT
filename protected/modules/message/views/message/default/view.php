<?php $this->pageTitle = Yii::app()->name . ' - ' . t("Detaljer"); ?>
<?php $isIncomeMessage = $viewedMessage->receiver_id == Yii::app()->user->getId() ?>
<div class="row">

	<div class="col-md-12 col-lg-12">
		<?php
		$viewedMessage->sender_id = $otherUserId;
		$this->renderPartial(Yii::app()->getModule('message')->viewPath . "/_chatview", array(
			"model" => $viewedMessage,
			"receiverName" => $viewedMessage->getReceiverName(),
			"senderName" => $viewedMessage->getSenderName()
		)); ?>
	</div>
</div>