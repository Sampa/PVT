<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>
<div class="container page-min-height">
    <div class="form">

        <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    	'id'=>'user-form',
    	// Please note: When you enable ajax validation, make sure the corresponding
    	// controller action is handling ajax validation correctly.
    	// There is a call to performAjaxValidation() commented in generated controller code.
    	// See class documentation of CActiveForm for details on this.
	        'enableAjaxValidation'=>true,
	        'enableClientValidation'=>true,
	        'clientOptions'=>array(
		        'validateOnType'=>true,
		        'validateOnSubmit' => true,
		        'errorCssClass' => 'has-error',
		        'successCssClass' => 'has-success',
		        'inputContainer' => '.form-control',
		        'validateOnChange' => true
	        ),
    )); ?>

        <p class="help-block"><?php echo t('Fält markerade med');?> <span class="required">*</span> <?php echo t(' är obligatoriska');?>.</p>

            <div class="control-group row  error col-md-12">
                <div class="col-lg-5">
                    <?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Välj ett användarnamn"))); ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-lg-5 col-md-5">
                    <?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Fyll i fullständigt namn"))); ?>
                </div>
            </div>
            <div class="row form-group ">
                <div class="col-lg-5 col-md-5">
                    <?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Fyll i din E-post"))); ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-lg-5 col-md-5">
                    <?php echo $form->passwordFieldControlGroup($model, 'new_password', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Nytt lösenord"))); ?>
                </div>
            </div>

             <div class="row form-group" >
                <div class="col-lg-5 col-md-5">
                  <?php echo $form->passwordFieldControlGroup($model, 'password_confirm', array('type' => 'password', 'class' => 'form-control', 'placeholder' => Yii::t("t", "Bekräfta nytt lösenord"), 'rows' => 6, 'cols' => 50)); ?>
                </div>
             </div>
            <?php if(isset($rmodel)):?>
                <div class="row form-group">
                    <?php echo $form->labelEx($rmodel, 'orgName', array('class' => 'col-lg-12 control-label')); ?>
                    <div class="col-lg-5 col-md-55">
                        <?php echo $form->textField($rmodel, 'orgName', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Nytt företagsnamn"), 'rows' => 6, 'cols' => 50)); ?>
                        <div class="help-block">
                             <?php echo $form->error($rmodel, 'orgName'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group" >
                    <?php echo $form->labelEx($rmodel, 'VAT', array('class' => 'col-lg-12 control-label')); ?>
                    <div class="col-lg-5">
                        <?php echo $form->textField($rmodel, 'VAT', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Nytt VAT-nr"), 'rows' => 6, 'cols' => 50)); ?>
                        <div class="help-block">
                             <?php echo $form->error($rmodel, 'VAT'); ?>
                        </div>
                    </div>
                </div>
            <?php endif;?>



            <div class="form-group row" style ="margin-left: 1px; clear:both;">
                <?php echo $form->labelEx($model, 'notify', array('class' => 'col-lg-1 control-label')); ?>
                <div class="col-lg-1">
                    <?php echo $form->checkBox($model, 'notify', array('id'=>'notify')); ?>
                    <div class="help-block">
                        <?php echo $form->error($model, 'notify'); ?>
                    </div>
                </div>
            </div>


            <div class="controls  col-lg-12">
                <div class="form-actions row" style ="margin-left: 0px">
                    <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t("t", "Updatera användare") : Yii::t("t", "Spara"),array(
                      'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                      'size'=>TbHtml::BUTTON_SIZE_LARGE,)); ?>
                </div>
            </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>