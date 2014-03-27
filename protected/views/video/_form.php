<div class="form">
<?php $form=$this->beginWidget('TbActiveForm',array(
	'id'=>'video-form',
	'action'=>'/video/create',
	'enableAjaxValidation'=>true,
			'enableClientValidation'=>true,
			'clientOptions' => array(
					  'validateOnSubmit'=>true,
					  'validateOnChange'=>true,
					  'validateOnType'=>true,
					 ),
		        'method'=>'post',
				'type'=>'horizontal',
				'htmlOptions'=>array(
					'enctype'=>'multipart/form-data',
					'class'=>'form-vertical',
				)
)); ?>
<?php echo $form->errorSummary($model); ?>
		<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>255)); ?>
		<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>
	<div class="form-actions">
	<!-- content of this element is displayed in the submitbutton while form is beeing submitted-->
	<span class="hide whileLoad"><i class="icon-repeat"></i></span>
		<?php $this->widget('TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>