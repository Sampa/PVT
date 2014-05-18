<?php $this->pageTitle = Yii::app()->name . ' - ' . MessageModule::t("Compose Message"); ?>
<?php
	$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_breadcrumbs');
?>

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

