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
        <?php echo $form->radioButtonListControlGroup($model,'typeOfEmployment',
            array('consult'=>Yii::t("t",'Konsultuppdrag'),'employment'=>Yii::t('t','Anställning'))); ?>
        <?php $this->renderPartial('_allCountriesSelect', array('model'=>$model,'pdf'=>$pdf)); ?>

        <div class="control-group row  error col-md-12">
            <div class="row col-md-5">
            <?php
            echo $form->textFieldControlGroup($model,'title',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>

                <!--            <label class="control-label required" for="Cv_title">Rubrik på ditt CV <span class="required">*</span></label>-->
<!--            <div class="controls">-->
<!--                <input name="Cv[title]" class="form-control" id="Cv_title" type="text" maxlength="255">-->
<!--                <p class="help-block" id="Cv_title_em_">Rubrik på ditt CV får inte vara blankt.</p>-->
<!--            </div>-->
            </div>
        </div>
			<div class="row" style="margin-left: 5px;"">
				<?php echo Yii::t("t","Välj en pdf fil som innehåller ditt CV och ladda upp den här");?>
				<div id="fileSelect" style="margin-left: 8px;margin-top: 10px;"><?php
				$this->widget( 'xupload.XUpload', array(
						'url' => Yii::app( )->createUrl( "/cv/upload"),//vi tar hand om filerna i CvController och metoden actionUpload
						//our XUploadForm
						'model' => $pdf,
						'options'=>array(
							'maxFileSize' => 2700000,//I bytes så det här är säger att 2,5 mb är max vad en pdf får vara
							'acceptFileTypes' => "js:/(\.|\/)(pdf)$/i",//tillåt bara pdf filändelser
						),
						//We set this for the widget to be able to target our own form
						'htmlOptions' => array('id'=>'cv-form'),
						'attribute' => 'file',
						'multiple' => false,
						//Note that we are using a custom view for our widget
						//Thats becase the default widget includes the 'form'
						//which we don't want here
						'formView' => 'pdf', //protected/extensions/xupload/views
						'autoUpload'=>true,//starta uppladdningen direkt användaren valt fil
					)
				);
				?>
                </div>
        <div class="form-actions" style="margin-left:-10px;margin-top:-20px">
            <?php echo TbHtml::submitButton($model->isNewRecord ? yii::t("t",'Publicera') : yii::t("t",'Spara'),array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_LARGE,
            )); ?>
			</div>

    <?php $this->endWidget(); ?>
</div><!-- form -->