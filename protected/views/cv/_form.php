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
	    'enableClientValidation'=>true,
	    'clientOptions'=>array(
		    'validateOnType'=>true,
		    'validateOnSubmit' => true,
		    'errorCssClass' => 'has-error',
		    'successCssClass' => 'has-success',
		    'inputContainer' => '.control-group',
		    'validateOnChange' => true
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
            <div class="pull-left col-md-12">
                <?php $this->renderPartial('_allCountriesSelect', array('model'=>$model,'pdf'=>$pdf,'showAddButton'=>true)); ?>
            </div>

        </div>
        <div class="control-group row  error col-md-4">
            <div id="areaNotice" class="" style="display:none;">
                <ul class="list-group" id="areaTarget">
                </ul>
            </div>
            <input type="hidden" id="listOfAreas" name="geoAreas"/>
        </div>
        <div class="clearfix"></div>
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
            )); ?>
		</div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<script>
	$(document).ready(function(){
        $("#addArea").on("click",function(event){
            //hindra den från att söka i formuläret
            event.preventDefault();
           var country,region,city;
            country = $("#countries").val();
            region  = $("#geoRegion").val();
            city = $("#geoCity").val();
            var currentValue = $("#listOfAreas").val();
            var html = '<li class="list-group-item list-group-item-info green">';
            html += country+", "+region+", "+city+"</li>";
            var obj = $($.parseHTML(html));
            $("#areaTarget > li").removeClass("green");
            $("#areaTarget").append(obj);
            $("#listOfAreas").val(currentValue+country+", "+region+", "+city+ "//");
            $("#areaNotice").fadeIn("slow")
        });

		$("#Cv_tags").select2({
			tags:<?php echo json_encode(Tag::getTagsAsString());?>
		});
	})
</script>
<style>

    .standard{
        color: #000;
        background-color: #fff;
    }
</style>