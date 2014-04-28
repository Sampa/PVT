<?php
/* @var $this CvController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Hitta CV'),
);
?>

  <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/js/select2_locale_sv.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/select2.css" media="screen"/>

    <?php if (Yii::app()->user->hasFlash('index')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('index'); ?></strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1><?php echo Yii::t("t", "Hitta CV");?> </h1>
        </div>
        <div class="horizontal-form">

<form class="form" role="search" name="search" method="post" >
	<div class="form-group">
		<input type="text" name="searchbox" class="form-control" placeholder="Search">
	</div>
  <div class="checkbox">
      <input name="consult" type="checkbox"/> <?php echo Yii::t("t","Sök efter konsultuppdrag");?><br>
       <input name="employment" type="checkbox"/> <?php echo Yii::t("t","Sök efter tillsvidareanställning");?>
  </div>
  <div>
    <?php $this->renderPartial('_allCountriesSelect', array('')); ?>
  </div>

  <div style="margin-top:15px;">
    <button type="submit" class="btn btn-primary"><?php echo Yii::t("t","Sök");?></button>
  </div>
</form>
<hr/>

<h3> <?php echo Yii::t('t', 'Sortera på:');?> </h3>
		<div class="btn-group">
  <button id="title" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Rubrik');?></button>
  <button id="date" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Datum');?></button>
  <button id="typeOfEmployment" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Anställningsform');?></button>
  <!--- <button id="geograficArea" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Geografisk area');?></button>-->
</div>

<?php if($resultCount==0):?>
    <div class="alert alert-info"><?php echo Yii::t("t","Inga sökresultat hittades så vi visar alla");?></div>
<?php endif;?>
<div id="listOfCvs">
	<?php
	    $this->widget('bootstrap.widgets.TbListView',array(
		    'dataProvider'=>$dataProvider,
		    'itemView'=>'_view',
	    ));
	?>
</div><!-- form -->
    <?php endif;?>

<script>
$(document).ready(function () {
	$(".sortButton").on("click",function(){
		$.ajax({
			type: "POST",
			url: "cv/",
			data: {sortBy: $(this).attr("id")}
		}).done(function( data ) {
			document.querySelector("#listOfCvs").innerHTML = "";
			$("#listOfCvs").html(data);
		});
	});
    $("#countries").select2();
    $("#countries").on("change",function(){
      if ( $(this).val() == "default" ) { 
        $("#geographicAreaForm").fadeOut();
      }else {
        $("#geographicAreaForm").fadeIn();
      }
    });
});
</script>
