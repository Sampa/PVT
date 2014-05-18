<?php $this->pageTitle=Yii::app()->name . ' - ' . MessageModule::t("Compose Message"); ?>
<?php $isIncomeMessage = $viewedMessage->receiver_id == Yii::app()->user->getId() ?>

<?php
	$this->breadcrumbs = array(
		MessageModule::t("Messages"),
		($isIncomeMessage ? MessageModule::t("Inbox") : MessageModule::t("Sent")) => ($isIncomeMessage ? 'inbox' : 'sent'),
		CHtml::encode($viewedMessage->subject),
	);
?>

<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_styles') ?>
<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_flash') ?>

<div class="row">

<?php //$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_navigation') ?>
	<div class="col-md-12 col-lg-12">
        <?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . "/_chatview",array("model"=>$viewedMessage,"receiverName"=>$viewedMessage->getReceiverName()));?>

		<?php $form = $this->beginWidget('CActiveForm', array(
			'id'=>'message-delete-form',
			'enableAjaxValidation'=>false,
			'action' => $this->createUrl('delete/', array('id' => $viewedMessage->id))
		)); ?>
		<button class="btn danger"><?php echo MessageModule::t("Delete") ?></button>
		<?php $this->endWidget(); ?>

		<table class="bordered-table zebra-striped">
			<tr>
				<th>
					<?php if ($isIncomeMessage): ?>
						From: <?php echo $viewedMessage->getSenderName() ?>
					<?php else: ?>
						To: <?php echo $viewedMessage->getReceiverName() ?>
					<?php endif; ?>
				</th>
				<th>
					<?php echo CHtml::encode($viewedMessage->subject) ?>
				</th>
				<th>
					<?php echo date(Yii::app()->getModule('message')->dateFormat, strtotime($viewedMessage->created_at)) ?>
				</th>
			</tr>
			<tr>
				<td colspan="3">
					<?php echo CHtml::encode($viewedMessage->body) ?>
				</td>
			</tr>
		</table>

		<h2><?php echo MessageModule::t('Reply') ?></h2>

		<div class="form">
			<?php $form = $this->beginWidget('CActiveForm', array(
				'id'=>'message-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<?php echo $form->errorSummary($message, null, null, array('class' => 'alert-message block-message error')); ?>

			<div class="input">
				<?php echo $form->hiddenField($message,'receiver_id'); ?>
				<?php echo $form->error($message,'receiver_id'); ?>
			</div>
			<?php echo $form->labelEx($message,'subject'); ?>
			<div class="input">

				<?php echo $form->textField($message,'subject'); ?>
				<?php echo $form->error($message,'subject'); ?>
			</div>

			<?php echo $form->labelEx($message,'body'); ?>
			<div class="input">
				<?php echo $form->textArea($message,'body'); ?>
				<?php echo $form->error($message,'body'); ?>
			</div>

			<div class="buttons">
				<button class="btn primary"><?php echo MessageModule::t("Reply") ?></button>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>

<div style="display:block;" id="chatDiv">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-comment"></span> Chat
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-time"></span>
                                            Away</a></li>
                                    <li class="divider"></li>
                                    <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                            Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <ul class="chat">
                                <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                            dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                            dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix"><span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                                <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                            dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix"><span class="chat-img pull-right">
                            <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />
                        </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>15 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
                                            dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<button id="chatButton">Chat</button>
<script>
    $(document).ready(function(){
        $("#chatButton").on('click',function(){
            $("#chatDiv").fadeIn();
        });
    });
</script>
