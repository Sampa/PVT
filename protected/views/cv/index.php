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


    <?php if (Yii::app()->user->hasFlash('index')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('index'); ?></strong>
        </div>
    <?php else: ?>
        <div class="page-header">
            <h1><?php echo Yii::t("t", "Sök CV");?> </h1>
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
    <button type="submit" class="btn btn-default"><?php echo Yii::t("t","Sök");?></button>
  </div>
</form>
<hr/>
<?php if($resultCount==0):?>
    <div class="alert alert-info"><?php echo Yii::t("t","Inga sökresultat hittades så vi visar alla");?></div>
<?php endif;?>
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
    $("#countries").on("change",function(){
	    $("#geographicAreaForm").fadeIn();
    });
});
</script>
