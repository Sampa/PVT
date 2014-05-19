<?php $this->pageTitle = Yii::app()->name . ' - ' . t("Konversationer"); ?>
<?php
	$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_breadcrumbs',array('sent'=>$sent));
//	$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_navigation',array('sent'=>$sent,'inbox'=>$inbox));
?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-10 col-xs-9 bhoechie-tab-container">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
				<div class="list-group">
					<a href="#" class="list-group-item active text-center">
						<h4 class="glyphicon glyphicon-envelope"></h4><br/> <?= t("Meddelanden"); ?>
					</a>
					<a href="#" class="list-group-item text-center">
						<h4 class="glyphicon glyphicon-road"></h4><br/> <?= t("Enkätsvar"); ?>
					</a>
					<a href="#" class="list-group-item text-center">
						<h4 class="glyphicon glyphicon-pencil"></h4><br/> <?= t("Skickade");?>
					</a>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
				<!-- meddelanden/chat section -->
				<div class="bhoechie-tab-content active">
					<?php
					//innehållet sätt i composecontroller getInboxContent() och finns i inbox.php
						echo $inbox;
					?>
				</div>
			</div>
			<!-- enkätsvar section -->
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
				<div class="bhoechie-tab-content">
					<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
				</div>
			</div>
			<!-- Skickade search -->
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
				<div class="bhoechie-tab-content">
					<?php
					//innehållet sätt i composecontroller getSentContent() och finns i sent.php
						echo $sent;
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		<!--	   -->

	});
</script>
