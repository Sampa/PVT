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
                <?php echo $form->labelEx($model, 'notify', array('class' => 'col-lg-3 control-label')); ?>
                <div class="col-lg-1">
                    <?php echo $form->checkBox($model, 'notify', array('class' => 'form-control', 'id'=>'notify')); ?>
                    <div class="help-block">
                        <?php echo $form->error($model, 'notify'); ?>
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
    <div class="col-lg-3"><a href="" data-toggle="modal" data-target="#agreementPopup">Läs användaravtal</a></div>
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

<div class="modal fade" id="agreementPopup" tabindex="-1" role="dialog" aria-labelledby="agreementPopupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="agreementPopupLabel">Användaravtal</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div>
                        <p><?php echo t("CV-Pages är en webbplats avsedd att användas endast till jobbrekryteringar och får inte användas i andra avseenden.
                        Detta innebär att det endast är CV:n som får laddas upp av publicerare. Vid missbruk kan ditt konto komma att stängas av.")?>
                        </p>
                        <p><?php echo t("CV-Pages förbehåller sig rätten att undanhålla och ta bort material som finns på ditt konto,utan förhandsbesked,
                        om CV-Pages anser att materialet strider mot detta avtal. CV-Pages har inga skyldigheter att förvara, spara eller förse med kopior av material
                        som du tillhandahåller när du använder CV-Pages tjänster.")?>
                        </p>
                        <p><?php echo t("CV-Pages ansvarar inte för det material som läggs upp och ansvarar inte heller för något som kan förekomma vid kontakt mellan publicerare och rekryterare.
                        CV-Pages garanterar inte anställning till publicerare som har nått en överenskommelse med rekryterare.
                        Det finns möjlighet för användare att rapportera om olämpligt material förekommer. Dock får missbruk av denna funktion inte förekomma.
                        Vid missbruk kan ditt konto komma att stängas av.");?>
                        </p>
                        <p><?php echo t("Jag godkänner härmed att jag har läst och förstått användaravtalet och hur mina personuppgifter kommer att hanteras och samtycker till att CV-Pages
                        hanterar dessa i enlighet med informationen ovan, samt godkänner ovanstående villkor.
                        ")?></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
