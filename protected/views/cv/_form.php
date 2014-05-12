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
    'clientOptions'=>array(
        'validateOnChange'=>true,
        'validateOnType'=>true,

    ),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>

    <p class="help-block"><?php echo Yii::t("t", "Fält markerade med * måste fyllas i");?>

        <?php echo $form->radioButtonListControlGroup($model,'typeOfEmployment',
            array('consult'=>Yii::t("t",'Konsultuppdrag'),'employment'=>Yii::t('t','Anställning'))); ?>
        <div class="control-group row  error col-md-12">
            <div class="row col-md-5">
                <?php echo $form->textFieldControlGroup($model,'title',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>
            </div>
        </div>
        <!--Välja geographicAreas-->
        <div class="row" style="">
            <div class="col-md-1" id="newAreaWrapper"  style="margin-top: 20px; margin-left: 0px; margin-right: -25px;">
                <a href="#" id="addArea" class="btn btn-success btn-small">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </a>
            </div>
            <div class="pull-left col-md-10">
                <?php $this->renderPartial('_allCountriesSelect', array('model'=>$model,'pdf'=>$pdf)); ?>
            </div>

        </div>
        <div class="control-group row  error col-md-4">
            <div id="areaNotice" class="alert alert-info" style="display:none;">
               <span id="areaTarget">

               </span>
                Du kan nu välja ett till geografiskt area
            </div>
            <input type="text" id="listOfAreas" name="geoAreas"/>
        </div>
        <span class="clearfix"></span>
		<div class="control-group row  error col-md-12">
			<div class="row col-md-5">
				<?php echo $form->textFieldControlGroup($model,'tags',array('class'=>'col-md-5 form-control','maxlength'=>255)); ?>
			</div>
		</div>

		<div class="row" style="margin-left: 5px;">
			<?php echo Yii::t("t","Välj en pdf fil som innehåller ditt CV och ladda upp den här");?>
			<div id="fileSelect" style="margin-left: 8px;margin-top: 10px;"><?php
				$this->widget( 'xupload.XUpload', array(
						'url' => Yii::app( )->createUrl( "/cv/upload"),//vi tar hand om filerna i CvController och metoden actionUpload
						//our XUploadForm
						'model' => $pdf,
						'options'=>array(
							'maxFileSize' => 100000,//I bytes så det här är säger att 100kb är max vad en pdf får vara
							'acceptFileTypes' => "js:/(\.|\/)(pdf)$/i",//tillåt bara pdf filändelser
						),
						//We set this for the widget to be able to target our own form
						'htmlOptions' => array('id'=>'cv-form'),
						'attribute' => 'file',
						'multiple' => false,
						'formView' => 'pdf', //protected/extensions/xupload/views
						'autoUpload'=>true,//starta uppladdningen direkt användaren valt fil
					)
				);
				?>
			</div>
		</div>
        <div class="form-actions" style="margin-left:-10px;">
            <?php echo TbHtml::submitButton($model->isNewRecord ? yii::t("t",'Publicera') : yii::t("t",'Spara'),array(
                'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                'size'=>TbHtml::BUTTON_SIZE_LARGE,
            )); ?>
		</div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<script>
	$(document).ready(function(){
        $("#addArea").on("click",function(){
           var country,region,city;
            country = $("#countries").val();
            region  = $("#geoRegion").val();
            city = $("#geoCity").val();
            var currentValue = $("#listOfAreas").val();
            $("#areaTarget").append("<p>Lade till:"+country+", "+region+", "+city+"</p>");
            $("#listOfAreas").val(currentValue+country+", "+region+", "+city+ "//");
            $("#areaNotice").fadeIn("slow");
        });

		$("#Cv_tags").select2({
			tags:<?php echo json_encode(Tag::getTagsAsString());?>
		});
	})
</script>