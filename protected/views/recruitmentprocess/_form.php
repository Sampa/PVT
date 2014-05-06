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
       <div class="controls col-md-12">
        <div class="controls col-md-5" style="margin-left:-20px">
          
                
              <label class="control-label required" for="RP_title"><?php echo Yii::t("t", "Namn på processen");?> <span class="required">*</span></label>
            <input name="Recruitmentprocesstitle" class="form-control" id="RP_title" type="text" maxlength="255"/> 
               <p class="help-block" id="RP_title_em_"> <?php echo Yii::t("t", "Namn på processen får inte vara blankt.");?></p>

             <label class="control-label required" for="TO_service"><?php echo Yii::t("t", "Typ av tjänst");?> </label>
            <input name="typeofservice" class="form-control" id="TO_service" type="text" maxlength="255"/> 
                        
          <!---  <?php echo $form->errorSummary($model); ?> -->
       <!---     <?php echo $form->textFieldControlGroup($model,'title',array('rows'=>6,'span'=>8)); ?>-->
   <!---         <?php echo $form->textFieldControlGroup($model,'recuiterId',array('span'=>5)); ?> -->
     <!---       <?php echo $form->textFieldControlGroup($model,'endDate',array('span'=>5)); ?>-->
        </div>
             <div class="controls  col-lg-12">
                <div class="form-actions row" style="margin-top:30px; clear:both;">
             <?php echo $form->radioButtonListControlGroup($model, Yii::t("t","typeOfEmployment" ),
               array('consult'=>Yii::t("t",'Konsultuppdrag'),'employment'=>Yii::t('t','Anställning'))); ?>
               </div>
             </div>

               <div>
                 <?php $this->renderPartial('/cv/_allCountriesSelect', array('')); ?>
              </div>
            <div class="controls  col-lg-12">
                <div class="form-actions row" style="margin-left:-15px; clear:both;">
                <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t("t", "Skapa process") : Yii::t("t", "Spara"),array(
		          'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		          'size'=>TbHtml::BUTTON_SIZE_LARGE,
		          )); ?>
              </div>
            </div>
        </div>
    <?php $this->endWidget(); ?>

</div><!-- form -->
<div style="clear:both;"></div>
