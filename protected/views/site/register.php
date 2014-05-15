<?php
$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Registrera dig'),
);
?>

<div class="container page-min-height">


    <div class="page-header">
        <h1><?php echo Yii::t("t", "Registrera dig här");?> </h1>
    </div>

    <div class="horizontal-form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation'=>true,
            'enableClientValidation' => true,
            // 'errorMessageCssClass'=>'has-error',
            'htmlOptions' => array('class' => 'form-horizontal',
                'role' => 'form',
                'id' => 'register-form'
            ),
            'clientOptions' => array(
                'id' => 'register-form',
                'validateOnSubmit' => true,
                'errorCssClass' => 'has-error',
                'successCssClass' => 'has-success',
                'inputContainer' => '.form-group',
                'validateOnChange' => true
            ),
        )); ?>

        <div class="form-group">
            <div class="col-lg-3 control-label">
                <div>
                    <p class="note"><?php echo Yii::t("t", "Fält markerade med");?> <span class="required">*</span> <?php echo Yii::t("t", "är obligatoriska");?>.</p>
                </div>
            </div>
            <div class="col-lg-5  has-error">
                <div class="help-block ">
                    <?php echo $form->errorSummary($model); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'fullname', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'fullname', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Fyll i fullständigt namn"))); ?>
                <span class="help-block help-inline ">
                <?php echo $form->error($model, 'fullname'); ?>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'email', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Fyll i din E-post"))); ?>
                <span class="help-block help-inline ">
                <?php echo $form->error($model, 'email'); ?>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'username', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Välj ett användarnamn"))); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'username'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'new_password', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->passwordField($model, 'new_password', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Välj ett lösenord"))); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'new_password'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'password_confirm', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->passwordField($model, 'password_confirm', array('type' => 'password', 'class' => 'form-control', 'placeholder' => Yii::t("t", "Bekräfta ditt lösenord"), 'rows' => 6, 'cols' => 50)); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'password_confirm'); ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'other_checkbox', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-1">
                <?php echo $form->checkBox($model, 'other_checkbox', array('class' => 'form-control','id'=>'other_checkbox')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'other_checkbox'); ?>
                </div>
            </div>
        </div>
        <div class="form-group" id='Companyname'>
            <?php echo $form->labelEx($model, 'Companyname', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'Companyname', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Skriv in företagsnamn"))); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'Companyname'); ?>
                </div>
            </div>
        </div>
  <div class="form-group" id='VAT'>
            <?php echo $form->labelEx($model, 'VAT', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'VAT', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Skriv in företagets VAT nummer"))); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'VAT'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
<!--            <div class="col-lg-5 col-lg-offset-3">-->
<!--                --><?php //echo CHtml::activeLabel($model, 'verify_code'); ?> 
<!--                --><?php //$this->widget('application.extensions.recaptcha.EReCaptcha',
//                    array('model' => $model, 'attribute' => 'verify_code',
//                        'theme' => 'red', 'language' => 'en',
//                        'publicKey' => Yii::app()->params['recaptcha_public_key']));?>
<!--                <div class="help-block">-->
<!--                    --><?php ////echo CHtml::error($model, 'verify_code');?>
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'accepted', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-1">
                <?php echo $form->checkBox($model, 'accepted', array('class' => 'form-control','id'=>'accepted')); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'accepted'); ?>

                </div>
            </div>
            <div class="col-lg-3"><a href="<?php echo Yii::app()->baseUrl;?>/site/page/agreement    ">Läs användaravtal</a></div>

        </div>

        

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-10">
                <?php echo CHtml::submitButton(Yii::t("t", "Registrera dig"), array('class' => 'btn btn-primary btn-lg')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <!-- form -->
</div>

