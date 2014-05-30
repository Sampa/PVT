 <?php $this->pageTitle = Yii::app()->name . ' - ' . t("Konversationer"); ?>
	<div class="row" style="min-width: 100%;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
				<div class="list-group">
					<a href="#" class="list-group-item active text-center">
						<h4 class="glyphicon glyphicon-envelope"></h4><br/> <?= t("Meddelanden"); ?>
					</a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-road"></h4><br/> <?= t("Enkäter"); ?>
                    </a>
                    <!--					<a href="#" class="list-group-item text-center">-->
<!--						<h4 class="glyphicon glyphicon-pencil"></h4><br/> --><?//= t("Skickade");?>
<!--					</a>-->
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
                    <?php if(user()->getState("role")=="publisher")
                        $this->renderPartial("application.views.survey.survey_recieved",array("surveys"=>$surveys));
                        else
                        $this->renderPartial("application.views.survey.survey_answered",array("surveys"=>$answeredSurveysForRecruiter));
                    ?>
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