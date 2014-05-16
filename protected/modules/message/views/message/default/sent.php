<?php $this->pageTitle=Yii::app()->name . ' - '.MessageModule::t("Messages:sent"); ?>
<?php
	$this->breadcrumbs=array(
        t("Meddelanden")=>array('/message/'),
        t("Skickade")=>array('/message/sent'),
	);
?>

<div class="row col-md-12 col-lg-12">
    <div class="col-md-3 col-lg-3">
        <?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_navigation'); ?>
    </div>
    <div class="col-md-9 col-lg-9">
    <?php if ($messagesAdapter->data): ?>
	<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'message-delete-form',
		'enableAjaxValidation'=>false,
		'action' => $this->createUrl('delete/')
	)); ?>

	<table class="dataGrid">
		<tr>
			<th  class="label">To</th>
			<th  class="label">Subject</th>
		</tr>
		<?php foreach ($messagesAdapter->data as $index => $message): ?>
			<tr>
				<td>
					<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
					<?php echo $form->hiddenField($message,"[$index]id"); ?>
					<?php echo $message->getReceiverName() ?>
				</td>
				<td><a href="<?php echo $this->createUrl('view/', array('message_id' => $message->id)) ?>"><?php echo $message->subject ?></a></td>
				<td><span class="date"><?php echo date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at)) ?></span></td>
			</tr>
		<?php endforeach ?>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton(t("Radera markerade")); ?>
	</div>
    <?php $this->endWidget(); ?>
    </div>
</div>

	<?php $this->widget('CLinkPager', array('pages' => $messagesAdapter->getPagination())) ?>
<?php endif; ?>
