<?php
$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t","Logga in"),
);
?>
<div class="container page-min-height">
    <div class="horizontal-form">
        <?php $form = $this->beginWidget('TbActiveForm', array(
            'enableClientValidation' => true,
            //'enableAjaxValidation'=>true,
            // 'errorMessageCssClass'=>'has-error',
            'id' => 'login-form',
            'htmlOptions' => array('class' => 'form-horizontal',
                'role' => 'form',
                'id' => 'login-form'
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
            <?php echo $form->labelEx($model, 'username', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Fyll i användarnamn eller e-post"))); ?>
                <div class="help-block">
                    <?php echo $form->error($model, 'username'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'password', array('class' => 'col-lg-3 control-label')); ?>
            <div class="col-lg-5">
                <?php echo $form->passwordField($model, 'password',
                    array('value'=>"",'class' => 'form-control',  'placeholder' => Yii::t("t", "Fyll i lösenord"))); ?>
                <span class="help-block help-inline ">
                <?php echo $form->error($model, 'password'); ?>
                    </span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-10">
                <div class="checkbox">
                    <label>
                        <?php echo $form->checkBox($model, 'rememberMe'); ?> <?php echo Yii::t("t", "Kom ihåg mig");?>
                    </label>
                </div>
            </div>
        </div>
        <!--<div class="control-group ">
              <div class="controls"><label for="LoginForm_rememberMe" class="checkbox">
                  <input
                      type="checkbox" value="0" name="LoginForm[rememberMe]" id="LoginForm_rememberMe">
                  Remember me next time<span style="display: none" id="LoginForm_rememberMe_em_"
                                             class="help-inline error"></span></label></div>
          </div>-->
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-10">
                <div class="btn-group">
                <?php echo CHtml::submitButton(Yii::t("t", "Logga in"), array('class' => 'btn btn-primary btn-md')); ?>
                <a class="btn btn-warning col-lg-offset-2 btn-md"
                   href="<?php echo $this->createUrl('site/email_for_reset') ?>"><?php echo Yii::t("t", "Glömt lösenord?");?></a>
            </div>
        </div>
    </div>
<!--        --><?php //if ($model->getRequireCaptcha()) : ?>
<!--            --><?php //$this->widget('application.extensions.recaptcha.EReCaptcha',
//                array('model' => $user, 'attribute' => 'verify_code',
//                    'theme' => 'red', 'language' => 'en',
//                    'publicKey' => Yii::app()->params['recaptcha_public_key']));?>
<!--            --><?php //echo CHtml::error($model, 'verify_code'); ?>
<!--        --><?php //endif; ?>
        <?php $this->endWidget(); ?>
    </div>
</div>




