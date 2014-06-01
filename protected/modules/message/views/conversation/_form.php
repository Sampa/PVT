<?php
/* @var $this ConversationController */
/* @var $model Conversation */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'conversation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
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
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
            <?php echo $form->hiddenField($model,'recruiterId',array('value'=>user()->id)); ?>
        <div class="row col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-10 col-md-8 col-sm-6">
                <?php echo $form->textFieldControlGroup($model,'title',array('maxlength'=>100,'class'=>'form-control')); ?>
            </div>
        </div>
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->