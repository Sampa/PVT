<?php $this->pageTitle = Yii::app()->name . ' - ' . MessageModule::t("Messages:inbox"); ?>
<?php
$this->breadcrumbs = array(
	t("Meddelanden") => array('/message/'),
	t("Inkorg") => array('/message/inbox'),
);
?>


<div class="row col-md-12 col-lg-12">
	<?php if ($messagesAdapter->data): ?>
		<?php $form = $this->beginWidget('TbActiveForm', array(
			'id' => 'message-delete-form',
			'enableAjaxValidation' => false,
			'action' => $this->createUrl('delete/')
		)); ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="menu">
						<div class="accordion">
							<?php
							$showed = array();
							foreach ($messagesAdapter->data as $index => $message):
								if (in_array($message->sender_id, $showed))
									continue;
								else
									$showed[] = $message->sender_id;
								?>
								<div class="accordion-group">
									<div class="accordion-heading country">
										<div
											class="panel <?php echo $message->is_read ? 'panel-default' : 'panel-default' ?>">
											<div class="panel-heading">
												<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
												<?php echo $form->hiddenField($message, "[$index]id"); ?>
												<a class="accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
													<?php echo $message->getSenderName(); ?>
												</a>
											</div>
										</div>
									</div>
									<div id="acc<?= $index; ?>" class="accordion-body collapse" style="padding:0px;">
										<div class="accordion-inner">
											<div class="panel-body"
											     style="margin-top:0px;padding:0px;min-height: 400px;">
												<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . "/_chatview", array(
														"model" => $message,
														"receiverName" => $message->getReceiverName(),
														"senderName" => $message->getSenderName())
												);?>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton(t("Ta bort markerade"), array("class" => "btn btn-danger")); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
		<?php $this->widget('CLinkPager', array('pages' => $messagesAdapter->getPagination())) ?>
	<?php endif; ?>
