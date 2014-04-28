<?php
/* @var $this CvController */
/* @var $model Cv */
?>

<?php
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    'CV'=>array('index'),
	Yii::t("t",'Skapa nytt CV'),
);

?>
<!--moved registration to /components/controller.php ->methods->registerJs + registerCss-->
<!--    <script type="text/javascript" src="--><?php //echo Yii::app()->baseUrl;?><!--/js/select2.min.js"></script>-->
<!--    <script type="text/javascript" src="--><?php //echo Yii::app()->baseUrl;?><!--/js/select2_locale_sv.js"></script>-->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo Yii::app()->baseUrl;?><!--/css/select2.css" media="screen"/>-->
<div class="page-header">
        <h1><?php echo Yii::t("t",'Publicera ditt CV');?></h1>
    </div>
    <section class="row" style="width:50%;margin-left: 5px;">
        Här kan du ladda upp en pdf fil från din filkatalog och publicera på vår offentliga CV-databas.
        Välj vilken typ av anställning du är främst intresserad av och i vilken del av världen som du vill arbeta på.
        Ge ditt CV en rubrik så att du lätt kan hålla reda på dina uppladdade CV:n på
        Mina sidor när du är inloggad som publicerare.
    </section>
    <?php $this->renderPartial('_form', array('model'=>$model,'pdf'=>$pdf)); ?>
    <script>
    $(document).ready(function () {
        $("#countries").select2();
        $("[type*='submit']").addClass("btn-lg");
        $("#countries").on("change",function(){
            $("#selectCountry").removeClass("has-error");
            $("#selectCountry").addClass("has-success");
            if ( $(this).val() == "default" ) { 
                $("#geographicAreaForm").fadeOut();
            }else {
                $("#geographicAreaForm").fadeIn();
            }
        });
    });
</script>