 <?php $this->pageTitle = Yii::app()->name . ' - ' . t("Konversationer"); ?>
	<div class="row" style="min-width: 100%;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
				<div class="list-group">
					<a href="#" class="list-group-item active text-center">
						<h2 class="glyphicon glyphicon-envelope"></h2>
                        <br/> <?= t("Meddelanden"); ?>
					</a>
                    <a href="#" class="list-group-item text-center">
                        <h2 class="glyphicon glyphicon-file"></h2>
                        <br/> <?= t("Enkäter"); ?>
                    </a>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
				<!-- meddelanden/chat section -->
				<div class="bhoechie-tab-content active">
					<?php
                    $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/inbox', array(
                        'messagesAdapter' => $inboxAdapter,
                    ));
					?>
				</div>
			</div>
			<!-- enkätsvar section -->
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
				<div class="bhoechie-tab-content">
                    <?php if(user()->getState("role")=="publisher")
                        $this->renderPartial("application.views.survey.survey_recieved",array("surveys"=>$surveys));
                            else
                        $this->renderPartial("application.views.survey.survey_answered",array("surveys"=>$answeredSurveysForRecruiter));
                    ?>
				</div>
			</div>
		</div>
	</div>

<script>
	$(document).ready(function () {
		<!--	   -->

	});
</script>
