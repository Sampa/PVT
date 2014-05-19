<?php $this->pageTitle = Yii::app()->name . ' - ' . t("Inkorg"); ?>
<?php
	$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_breadcrumbs');
?>
	<?php if ($messagesAdapter->data): ?>
		<?php $form = $this->beginWidget('TbActiveForm', array(
			'id' => 'message-delete-form',
			'enableAjaxValidation' => false,
			'action' => $this->createUrl('delete/')
		)); ?>
		<div class=" tableWrapper col-lg-12 col-md-12">
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
									<th></th>
								</tr>
							</thead>
							<tbody>
							<div class="accordion">
								<div class="accordion-group">
							<?php
								$showed = array();
								foreach ($messagesAdapter->data as $index => $message):
									if (in_array($message->sender_id, $showed))
										continue;
										$showed[] = $message->sender_id;
									//för varje konversation renderea denna template
									$this->renderPartial(Yii::app()->getModule('message')->viewPath . "/_conversationRowTemplate", array(
											"form"=>$form,
											"index"=>$index,
											"message" => $message,
											"receiverName" => $message->getReceiverName(),
											"senderName" => $message->getSenderName())
									);
									?>

								<?php endforeach ?>
								</div><!-- accordion-group-->
							</div>
							</tbody>
						</table>
					</div>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton(t("Ta bort markerade"), array("class" => "btn btn-danger")); ?>
			</div>
			<?php $this->endWidget(); ?>
		<?php $this->widget('CLinkPager', array('pages' => $messagesAdapter->getPagination())) ?>
	<?php endif; ?>
<style>
	.tableWrapper > .row{
		padding: 0 10px;
	}
	.tableWrapper .clickable{
		cursor: pointer;
	}

	.messagesHeading div {
		margin-top: -18px;
		font-size: 15px;
	}

</style>
