<?php
/* @var $this CvController */
/* @var $model Cv */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'cv-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <p class="help-block"><?php echo Yii::t("t", "Fält markerade med * måste fyllas i");?>
            <?php $form->checkBoxControlGroup($model,'showUserDetail',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'pathToPdf',array('span'=>5,'maxlength'=>255, 'style'=> 'display:none')); ?>

            <?php echo $form->radioButtonListControlGroup($model,'typeOfEmployment',array('kon'=>'Konsultuppdrag','anst'=>'Anställning')); ?>

            <?php echo $form->textFieldControlGroup($model,'geographicAreaId',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>255)); ?>
			<div class="row">
				<?php echo Yii::t("t","Välj ett cv att ladda upp (enbart pdf)");?>
				<?php
				$this->widget( 'xupload.XUpload', array(
						'url' => Yii::app( )->createUrl( "/cv/upload"),
						//our XUploadForm
						'model' => $pdf,
						'options'=>array(
							'maxFileSize' => 3000000,
							'acceptFileTypes' => "js:/(\.|\/)(pdf)$/i",

						),
						//We set this for the widget to be able to target our own form
						'htmlOptions' => array('id'=>'cv-form'),
						'attribute' => 'file',
						'multiple' => false,
						//Note that we are using a custom view for our widget
						//Thats becase the default widget includes the 'form'
						//which we don't want here
						'formView' => 'pdf',
						'autoUpload'=>true,
					)
				);
				?>
			</div>
        <div class="form-actions", style= "margin-top:20px">
        <?php echo TbHtml::submitButton($model->isNewRecord ? yii::t("t",'Publicera') : yii::t("t",'Spara'),array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    <?php $this->endWidget(); ?>
</div><!-- form -->