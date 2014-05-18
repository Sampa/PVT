<?php $this->pageTitle=Yii::app()->name . ' - '.MessageModule::t("Messages:inbox"); ?>
<?php
	$this->breadcrumbs=array(
        t("Meddelanden")=>array('/message/'),
        t("Inkorg")=>array('/message/inbox'),
    );
?>

<div class="row col-md-12 col-lg-12">
<!--    <div class="col-md-3 col-lg-3">-->
<!--        --><?php //$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_navigation'); ?>
<!--    </div>-->

<?php if ($messagesAdapter->data): ?>
	<?php $form = $this->beginWidget('TbActiveForm', array(
		'id'=>'message-delete-form',
		'enableAjaxValidation'=>false,
		'action' => $this->createUrl('delete/')
	)); ?>

	<table class="dataGrid">
		<tr>
			<th  class="label">From</th>
			<th  class="label">Subject</th>
			<th  class="label">Date</th>
		</tr>
		<?php foreach ($messagesAdapter->data as $index => $message): ?>
			<tr class="<?php echo $message->is_read ? 'read' : 'unread' ?>">
				<td>
					<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
					<?php echo $form->hiddenField($message,"[$index]id"); ?>
                    <a href="<?php echo $this->createUrl('view/', array('message_id' => $message->id)) ?>">
                        <?php echo $message->getSenderName(); ?>
                    </a>
                </td>
				<td><span class="date"><?php echo date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at)) ?></span></td>
			</tr>
		<?php endforeach ?>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton(t("Ta bort markerade"),array("class"=>"btn btn-danger")); ?>
	</div>
    <?php $this->endWidget(); ?>
</div>
	<?php $this->widget('CLinkPager', array('pages' => $messagesAdapter->getPagination())) ?>
<?php endif; ?>
