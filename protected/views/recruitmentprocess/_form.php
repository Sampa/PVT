<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'recruitmentprocess-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t("t", "Fält markerade med");?> <span class="required">*</span> <?php echo Yii::t("t", "är obligatoriska");?>.</p>
       <!--<div class="controls col-md-12">-->
        <div class="controls col-md-5" style="margin-left:-20px">  
            <label class="control-label required" for="RP_title"><?php echo Yii::t("t", "Namn på processen");?> <span class="required">*</span></label>
            <input name="Recruitmentprocess[title]" class="form-control" id="RP_title" type="text" maxlength="255"/> 
            <label class="control-label required" for="FO_service"><?php echo Yii::t("t", "Företag/Organisation");?> </label>
            <input name="Recruitmentprocess[company]" class="form-control" id="FO_service" type="text" maxlength="255"/>    
            <label class="control-label required" for="TO_service"><?php echo Yii::t("t", "Typ av tjänst");?> </label>
            <input name="Recruitmentprocess[typeOfService]" class="form-control" id="TO_service" type="text" maxlength="255"/> 
        </div>  

        <div class="controls" style="margin-top:250px">      
            <div class="controls" style="margin-left:10px">
                <div class="form-actions row" style="margin0top:30px; clear:both;">
                    <?php echo $form->radioButtonListControlGroup($model, Yii::t("t","typeOfEmployment" ),
                    array('consult'=>Yii::t("t",'Konsultuppdrag'),'employment'=>Yii::t('t','Anställning'))); ?>
                </div>
            </div>
        </div>

        <div>
            <?php $this->renderPartial('/cv/_allCountriesSelect', array('')); ?>
        </div>

        
        <div class="controls  col-lg-12">
            <div class="form-actions row" style="margin-left:-15px; clear:both;">
                <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t("t", "Skapa process") : Yii::t("t", "Spara"),array(
		          'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		          'size'=>TbHtml::BUTTON_SIZE_LARGE,)); ?>
            </div>
        </div>
    
    
    <?php $this->endWidget(); ?>

</div><!-- form -->
<div style="clear:both;"></div>
