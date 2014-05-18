<?php $this->pageTitle = Yii::app()->name . ' - ' . MessageModule::t("Compose Message"); ?>
<?php
	$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_breadcrumbs'); ?>
?>

<div class="row col-md-12 col-lg-12" style="min-height: 140px;">
	<div class="form">
		<?php if (Yii::app()->user->hasFlash('messageModule')): ?>
			<div class="alert-message success">
				<?php echo Yii::app()->user->getFlash('messageModule'); ?>
			</div>
		<?php endif; ?>
		<div style="display:block;" id="chatDiv">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<span class="glyphicon glyphicon-comment"></span> Chat
								<div class="btn-group pull-right">
									<button type="button" class="btn btn-default btn-xs dropdown-toggle"
									        data-toggle="dropdown">
										<span class="glyphicon glyphicon-chevron-down"></span>
									</button>
									<ul class="dropdown-menu slidedown">
										<li><a href="http://www.jquery2dotnet.com"><span
													class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
										<li><a href="http://www.jquery2dotnet.com"><span
													class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
										<li><a href="http://www.jquery2dotnet.com"><span
													class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
										<li><a href="http://www.jquery2dotnet.com"><span
													class="glyphicon glyphicon-time"></span>
												Away</a></li>
										<li class="divider"></li>
										<li><a href="http://www.jquery2dotnet.com"><span
													class="glyphicon glyphicon-off"></span>
												Sign Out</a></li>
									</ul>
								</div>
							</div>
							<div class="panel-body">
								<ul class="chat">
									<li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle"/>
                        </span>

										<div class="chat-body clearfix">
											<div class="header">
												<strong class="primary-font">Jack Sparrow</strong>
												<small class="pull-right text-muted">
													<span class="glyphicon glyphicon-time"></span>12 mins ago
												</small>
											</div>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
												bibendum ornare
												dolor, quis ullamcorper ligula sodales.
											</p>
										</div>
									</li>
									<li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle"/>
                        </span>

										<div class="chat-body clearfix">
											<div class="header">
												<small class=" text-muted"><span
														class="glyphicon glyphicon-time"></span>13 mins ago
												</small>
												<strong class="pull-right primary-font">Bhaumik Patel</strong>
											</div>
											<p>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
												bibendum ornare
												dolor, quis ullamcorper ligula sodales.
											</p>
										</div>
									</li>
									|
								</ul>
							</div>
							<div class="panel-footer">
								<div class="input-group">
									<input id="btn-input" type="text" class="form-control input-sm"
									       placeholder="Type your message here..."/>
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
	                            Send
                            </button>
                        </span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id' => 'message-form',
			'enableAjaxValidation' => true,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnType' => true,
				'validateOnSubmit' => true,
				'errorCssClass' => 'has-error',
				'successCssClass' => 'has-success',
				'inputContainer' => '.control-group',
				'validateOnChange' => true
			),
		)); ?>

		<p class="note"><?php echo MessageModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

		<?php echo $form->errorSummary($model); ?>
		<div class="col-md-8 col-lg-8">
			<div class="control-group row  error">
				<div class="row col-lg-10 col-md-10">
					<?php echo CHtml::textField('receiver', $receiverName) ?>
					<?php echo $form->textFieldControlGroup($model, 'receiver_id', array('class' => 'col-md-5 form-control', 'maxlength' => 255)); ?>
				</div>
			</div>

			<div class="control-group row  error ">
				<div class="row col-lg-10 col-md-10">
					<?php echo $form->textFieldControlGroup($model, 'subject', array('class' => 'col-md-5 form-control', 'maxlength' => 255)); ?>
				</div>
			</div>

			<div class="control-group row  error ">
				<div class="row col-lg-10 col-md-10">
					<?php echo $form->textAreaControlGroup($model, 'body', array('class' => 'col-md-5 form-control', 'maxlength' => 255)); ?>
				</div>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton(t("Skicka"), array("class" => "btn btn-primary")); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_suggest'); ?>

<script type="text/javascript">
	$(document).ready(function () {
		$("#receiver").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "<?php echo $this->createUrl('suggest/user') ?>",
					dataType: "jsonp",
					data: {
						featureClass: "P",
						style: "full",
						maxRows: 12,
						name_startsWith: request.term
					},

					success: function (data) {
						response($.map(data.users, function (user) {
							return {
								label: user.name,
								value: user.id
							}
						}));
					}
				});
			},
			minLength: 2,
			mustMatch: true,
			focus: function (event, ui) {
				$('#receiver').val(ui.item.label);
				return false;
			},
			select: function (event, ui) {
				$('#receiver').val(ui.item.label);
				$('#Message_receiver_id').val(ui.item.value);
				return false;
			},
			open: function () {
				$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
			},
			close: function () {
				$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
			}
		});
	});
</script>
<?php $this->pageTitle = Yii::app()->name . ' - ' . MessageModule::t("Messages:inbox"); ?>
<?php
$this->breadcrumbs = array(
	t("Meddelanden") => array('/message/'),
	t("Inkorg") => array('/message/inbox'),
);
?>


<div class="row col-md-12 col-lg-12">
	<!--    <div class="col-md-3 col-lg-3">-->
	<!--        --><?php //$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_navigation'); ?>
	<!--    </div>-->

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
							if (in_array($message->getReceiverName(), $showed))
								continue;
							else
								$showed[] = $message->getReceiverName();
							?>
							<div class="accordion-group">
								<div class="accordion-heading country">
									<div
										class="panel <?php echo $message->is_read ? 'panel-default' : 'panel-default' ?>">
										<div class="panel-heading">
											<!--					<span class="date">-->
											<?php //echo date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at)) ?><!--</span>-->
											<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
											<?php echo $form->hiddenField($message, "[$index]id"); ?>
											<a class="accordion-toggle" data-toggle="collapse"
											   href="#<?= $index; ?>"><?php echo $message->getSenderName(); ?></a>
											<!--			<a href="-->
											<?php //echo $this->createUrl('view/', array('message_id' => $message->id)) ?><!--">-->
											<!--				--><?php //echo $message->getSenderName(); ?>
											<!--			</a>-->
										</div>
									</div>
									<div id="<?= $index; ?>" class="accordion-body collapse" style="padding:0px;">
										<div class="accordion-inner">
											<div class="panel-body"
											     style="margin-top:0px;padding:0px;min-height: 400px;">
												<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . "/_chatview", array(
														"model" => $message,
														"receiverName" => $message->getReceiverName())
												);?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
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
