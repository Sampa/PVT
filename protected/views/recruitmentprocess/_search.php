<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'title',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'recruiterId',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'endDate',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'startDate',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'typeOfEmployment',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'typeOfService',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'geographicAreaID',array('span'=>5)); ?>




        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->