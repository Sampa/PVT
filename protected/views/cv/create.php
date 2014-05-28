<?php
/* @var $this CvController */
/* @var $model Cv */
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t","Mina Sidor")=>Yii::app()->getBaseUrl().'/user/'.app()->user->id,
	Yii::t("t",'Skapa nytt CV'),
);

?>
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
    $(document).ready(function ($) {
	    jQuery("[type*='submit']").addClass("btn-lg");
    });
</script>