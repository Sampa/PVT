<?php $this->pageTitle = Yii::app()->name . ' - ' . MessageModule::t("Messages:inbox"); ?>
<?php
$this->breadcrumbs = array(
	t("Meddelanden") => array('/message/'),
	t("Inkorg") => array('/message/inbox'),
);
?>
	<?php if ($messagesAdapter->data): ?>
		<?php $form = $this->beginWidget('TbActiveForm', array(
			'id' => 'message-delete-form',
			'enableAjaxValidation' => false,
			'action' => $this->createUrl('delete/')
		)); ?>
		<div class="container tableWrapper">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="menu">
						<div class="accordion">
							<div class="panel panel-success">
								<div class="panel-heading messagesHeading">
									<h3 class="panel-title"><?=t("Konversationer");?></h3>
									<div class="pull-right">
										<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
											<i class="glyphicon glyphicon-filter"></i>
										</span>
									</div>
								</div>
								<div class="panel-body messagesBody">
									<input
										type="text"
										class="form-control"
										id="task-table-filter"
										data-action="filter"
										data-filters="#task-table"
										placeholder="<?=t("Sök");?>"
									/>
								</div>
								<table class="table table-hover" id="task-table">
									<thead>
										<tr>
											<th><?=t("Ta bort");?></th>
											<th><?=t("Antal meddelanden");?></th>
											<th><?=t("Avsändare");?></th>
											<th><?=t("Alla lästa");?></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$showed = array();
										foreach ($messagesAdapter->data as $index => $message):
											if (in_array($message->sender_id, $showed))
												continue;
											else
												$showed[] = $message->sender_id;
											?>
											<div class="accordion-group">
												<tr class="accordion-heading">
													<td>
														<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
														<?php echo $form->hiddenField($message, "[$index]id"); ?>
													</td>
													<td class="clickable accordion-heading accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
														6
													</td>
													<td class="clickable accordion-heading accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
														<a class="" href="#">
															<?php echo $message->getSenderName(); ?>
														</a>
													</td>
													<td class="clickable accordion-heading accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
														Ja
													</td>
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
												</tr><!-- end table row -->
											</div><!-- accordion-group-->
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
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
<style>
	.tableWrapper > .row{
		/*margin-top:40px;*/
		padding: 0 10px;
	}
	.tableWrapper .clickable{
		cursor: pointer;
	}

	.messagesHeading div {
		margin-top: -18px;
		font-size: 15px;
	}
	.messagesHeading div span{
		margin-left:5px;
	}
	.messagesBody{
		/*display: none;*/
	}
</style>
