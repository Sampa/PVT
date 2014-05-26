<?php $this->pageTitle = Yii::app()->name . ' - ' . MessageModule::t("Compose Message"); ?>
<div class="row col-md-12 col-lg-12" style="min-height: 140px;">
	<div class="form">
		<?php if (Yii::app()->user->hasFlash('messageModule')): ?>
			<div class="alert-message success">
				<?php echo Yii::app()->user->getFlash('messageModule'); ?>
			</div>
		<?php endif; ?>

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
      <h2><?php echo Yii::t('t','Starta chatt med ').$receiverName;
          ?></h2>
		<p class="note"><?php echo Yii::t('t','Fält markerade med');?> <span class="required">*</span> <?php echo Yii::t('t',' är obligatoriska.');?></p>

		<?php echo $form->errorSummary($model); ?>
			<div class="control-group row  error">
				<div class="row col-lg-10 col-md-10">
					<?php echo CHtml::hiddenField('receiver', $receiverName) ?>
					<?php echo $form->hiddenField($model, 'receiver_id', array('maxlength' => 255)); ?>
				</div>
			</div>

			<div class="control-group row  error ">
				<div class="row col-lg-6 col-md-6">
					<?php echo $form->textFieldControlGroup($model, 'subject', array('class' => 'col-md-5 form-control', 'maxlength' => 255)); ?>
				</div>
			</div>

			<div class="control-group row  error ">
				<div class="row col-lg-6 col-md-6">
					<?php echo $form->textAreaControlGroup($model, 'body', array('class' => 'col-md-5 form-control', 'maxlength' => 255)); ?>
				</div>
			</div>
			<div class="row buttons">
				<?php echo CHtml::submitButton(t("Skicka"), array("class" => "btn btn-primary")); ?>
			</div>

		<?php $this->endWidget(); ?>
	</div>
</div>

