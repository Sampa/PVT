<?php
$this->pageTitle = Yii::app()->name . Yii::t("t","Kontakta oss");
if($_SERVER['REQUEST_URI']!="/" && $_SERVER['REQUEST_URI']!="/Group1/"){
	$this->breadcrumbs = array(
	    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
	    Yii::t("t",'Kontakt'),
	);
}
?>
<div class="container ">
    <?php if (Yii::app()->user->hasFlash('contact')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('contact'); ?></strong>
        </div>
    <?php else: ?>
<!--        <div class="page-header">-->
<!--            <h1>--><?php //echo Yii::t("t", "Kontakt");?><!-- </h1>-->
<!--        </div>-->
        <div class="col-lg-12 col-md-12">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                //'enableAjaxValidation'=>true,
                // 'errorMessageCssClass'=>'has-error',
                'htmlOptions' => array('class' => '',
                    'role' => 'form',
                    'id' => 'contact-form'
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
	                <div class="col-lg-12  has-error">
	                    <div class="help-block ">
	                        <?php echo $form->errorSummary($model); ?>
	                    </div>
	                </div>
	            </div>

	        <section class="col-lg-3 col-md-3">
	            <div class="form-group">
	                <?php echo $form->labelEx($model, 'name', array('class' => ' control-label')); ?>
	                    <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' =>  Yii::t("t", "Namn"))); ?>
	                    <div class="help-block">
	                        <?php echo $form->error($model, 'name'); ?>
	                    </div>
	            </div>

	            <div class="form-group">
	                <?php echo $form->labelEx($model, 'email', array('class' => ' control-label')); ?>
	                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => Yii::t("t", "E-post"))); ?>
	                    <span class="help-block help-inline ">
	                <?php echo $form->error($model, 'email'); ?>
	                    </span>
	            </div>

	            <div class="form-group">
	                <?php echo $form->labelEx($model, 'subject', array('class' => 'control-label')); ?>
	                    <?php echo $form->textField($model, 'subject', array('class' => 'form-control', 'placeholder' => Yii::t("t", "Ämne"))); ?>
	                    <div class="help-block">
	                        <?php echo $form->error($model, 'subject'); ?>
	                    </div>
	            </div>
		    </section>
	        <section class="col-lg-6 col-md-6">
	        <div class="form-group">
                <?php echo $form->labelEx($model, 'body', array('class' => 'control-label')); ?>
                    <?php echo $form->textArea($model, 'body', array(
	                    'class' => 'form-control', 'placeholder' => Yii::t("t", "Skriv meddelande här"), 'rows' => 9, 'cols' => 60)
                    ); ?>
                    <div class="help-block">
                        <?php echo $form->error($model, 'body'); ?>
                    </div>
            </div>


            <div class="form-group">
                <div class="">
                    <?php if ($model->getRequireCaptcha()) : ?>
	                    <?php echo $form->labelEx($model, 'verify_code', array('class' => 'control-label')); ?>
	                    <?php $this->widget('application.extensions.recaptcha.EReCaptcha',
                            array('model' => $model, 'attribute' => 'verify_code',
                                'theme' => 'red', 'language' => 'en',
                                'publicKey' => Yii::app()->params['recaptcha_public_key']));?>
                        <?php echo CHtml::error($model, 'verify_code'); ?>
                    <?php endif; ?>
                </div>
            </div>
			</section>
	        <section class="col-lg-3 col-md-3">
            <div class="form-group">
                <div class="">
	                <form>
		                <legend><span class="glyphicon glyphicon-globe"></span> <?=t("Våra uppgifter");?></legend>
		                <address>
			                <strong>Cv-Pages</strong><br>
			                795 Folsom Ave, Suite 600<br>
			                San Francisco, CA 94107<br>
			                <abbr title=<?=t('Telefon');?>
				                </abbr>
			                (123) 456-7890
		                </address>
		                <address>
			                <strong>Full Name</strong><br>
			                <a href="mailto:#">first.last@example.com</a>
		                </address>
	                </form>
                    <?php echo CHtml::submitButton(Yii::t("t", "Skicka"), array('class' => 'btn btn-success btn-lg')); ?>
                </div>
            </div>
		    </section>
            <?php $this->endWidget(); ?>
        </div><!-- form -->
    <?php endif;?>
</div>











