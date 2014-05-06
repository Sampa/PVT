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
          
                
              <label class="control-label required" for="RP_title"><?php echo Yii::t("t", "Namn på processen");?> <span class="required">*</span></label>
            <input name="Recruitmentprocesstitle" class="form-control" id="RP_title" type="text" maxlength="255"/> 
               <p class="help-block" id="RP_title_em_"> <?php echo Yii::t("t", "Namn på processen får inte vara blankt.");?></p>
           
             <!---  <?php echo $form->errorSummary($model); ?> -->

            <!---     <?php echo $form->textFieldControlGroup($model,'title',array('rows'=>6,'span'=>8)); ?>-->

            

   <!---         <?php echo $form->textFieldControlGroup($model,'recuiterId',array('span'=>5)); ?> -->

     <!---       <?php echo $form->textFieldControlGroup($model,'endDate',array('span'=>5)); ?>-->
        


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