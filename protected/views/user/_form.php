<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>
<div class="container page-min-height">
    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'user-form',
    	// Please note: When you enable ajax validation, make sure the corresponding
    	// controller action is handling ajax validation correctly.
    	// There is a call to performAjaxValidation() commented in generated controller code.
    	// See class documentation of CActiveForm for details on this.
    	'enableAjaxValidation'=>true,
    )); ?>

        <p class="help-block">Fields with <span class="required">*</span> are required.</p>

             <div class="form-group">
                <?php echo $form->labelEx($model, 'username', array('class' => 'col-lg-12 control-label')); ?>
                <div class="col-lg-5">
                    <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Välj ett användarnamn"))); ?>
                    <div class="help-block">
                        <?php echo $form->error($model, 'username'); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'fullname', array('class' => 'col-lg-12 control-label')); ?>
                <div class="col-lg-5">
                    <?php echo $form->textField($model, 'fullname', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Fyll i fullständigt namn"))); ?>
                    <span class="help-block help-inline ">
                    <?php echo $form->error($model, 'fullname'); ?>
                        </span>
                </div>
            </div>
            <div class="form-group ">
                <?php echo $form->labelEx($model, 'email', array('class' => 'col-lg-12 control-label')); ?>
                <div class="col-lg-5">
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Fyll i din E-post"))); ?>
                    <span class="help-block help-inline ">
                    <?php echo $form->error($model, 'email'); ?>
                        </span>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'new_password', array('class' => 'col-lg-12 control-label')); ?>
                <div class="col-lg-5">
                    <?php echo $form->passwordField($model, 'new_password', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Nytt lösenord"))); ?>
                    <div class="help-block">
                        <?php echo $form->error($model, 'new_password'); ?>
                    </div>
                </div>
            </div>

             <div class="form-group" >
                <?php echo $form->labelEx($model, 'password_confirm', array('class' => 'col-lg-12 control-label')); ?>
                <div class="col-lg-5">
                  <?php echo $form->passwordField($model, 'password_confirm', array('type' => 'password', 'class' => 'form-control', 'placeholder' => Yii::t("t", "Bekräfta nytt lösenord"), 'rows' => 6, 'cols' => 50)); ?>
                  <div class="help-block">
                    <?php echo $form->error($model, 'password_confirm'); ?>
                   </div>
                </div>
             </div>
            <?php if(isset($rmodel)):?>
                <div class="form-group">
                    <?php echo $form->labelEx($rmodel, 'orgName', array('class' => 'col-lg-12 control-label')); ?>
                    <div class="col-lg-5">
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