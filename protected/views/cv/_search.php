<?php
/* @var $this CvController */
/* @var $model Cv */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


                    <?php echo $form->textFieldControlGroup($model,'id',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'showUserDetail',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'date',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'pathToPdf',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'typeOfEmployment',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'geographicAreaId',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'title',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textAreaControlGroup($model,'pdfText',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                    <?php echo $form->textFieldControlGroup($model,'publisherId',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

        <div class="form-actions" style="margin-top: 50px">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- search-form -->
