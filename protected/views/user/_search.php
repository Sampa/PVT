<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'username',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'email',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'status',array('span'=>5)); ?>

                                    <?php echo $form->textFieldControlGroup($model,'salt',array('span'=>5,'maxlength'=>255)); ?>

                            <?php echo $form->textFieldControlGroup($model,'reset_token',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'login_attempts',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'login_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'login_ip',array('span'=>5,'maxlength'=>32)); ?>

                    <?php echo $form->textFieldControlGroup($model,'activation_key',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->textFieldControlGroup($model,'validation_key',array('span'=>5,'maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'create_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'update_time',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'notify',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->