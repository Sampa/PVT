<?php
$this->pageTitle = Yii::app()->name . ' - Email For Reset ';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Återställ lösenord'),
);
?>
<div class="container page-min-height">

    <div class="page-header">
        <h1><?php echo Yii::t("t", "Återställ ditt lösenord");?></h1>
        <strong><?php echo  Yii::t("t", 'Skriv in din E-post, vi skickar en länk för lösenordsåterställning.', '');?></strong>
    </div>
    <div class="horizontal-form">

        <?php $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            //'enableAjaxValidation'=>true,
            'id' => 'email-form',
            'htmlOptions' => array('class' => 'form-horizontal',
                'role' => 'form',
                'id' => 'email-form'
            ),
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'errorCssClass' => 'has-error',
                'successCssClass' => 'has-success',
                'inputContainer' => '.form-group',
                'validateOnChange' => true
            ),
        )); ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'email', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->emailField($model, 'email', array('class' => 'form-control input-lg', 'placeholder' => Yii::t("t", "Din e-post här"))); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'email'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-6 col-lg-10">
                <?php echo CHtml::submitButton(Yii::t("t", "Skicka"), array('class' => 'btn btn-primary btn-lg')); ?>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>




