<?php
/* @var $this CvController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Hitta CV'),
);

$this->menu=array(
	array('label'=>'Create Cv','url'=>array('create')),
	array('label'=>'Manage Cv','url'=>array('admin')),
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

<form class="form" role="search">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Search">
	</div>
	
</form>
  <div class="checkbox">
    <label>
      <input type="checkbox"> <?php echo Yii::t("t","Sök efter konsultuppdrag");?><br>
       <input type="checkbox"> <?php echo Yii::t("t","Sök efter tillsvidareanställning");?>
       </label>
  </div>
  <div>
    <?php $this->renderPartial('_allCountriesSelect', array('')); ?>
  </div>

  <div style="margin-top:15px;">
    <button type="submit" class="btn btn-default"><?php echo Yii::t("t","Sök");?></button>
  </div>
<hr/>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
        </div><!-- form -->
    <?php endif;?>

<script>
$(document).ready(function () {
    $("#countries").on("change",function(){
	    $("#geographicAreaForm").fadeIn();
    });
});
</script>
