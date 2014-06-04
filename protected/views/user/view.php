<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
if(Yii::app()->user->id ==1){
	$this->breadcrumbs=array(
		t("Hem")=> Yii::app()->getHomeUrl(),
		t("Användare")=>array('index'),
  		$model->name,
	);
}
else{
	$this->breadcrumbs=array(
		t("Hem")=> Yii::app()->getHomeUrl(),
		t('Användare'),
  		$model->name,
	);
}
?>

<div class = 'page-header'>
	<h1><?php echo Yii::t('t','Mina sidor');?></h1>
</div>
<?php if(!isset($rmodel)): ?>
	<?php $this->widget('zii.widgets.CDetailView',array(
	    'htmlOptions' => array(
	        'class' => 'table table-striped table-condensed table-hover',
	    ),
	    'data'=>$model,
	    'attributes'=>array(
			'username',
			'name',
			'email',
		),

	)); ?>
<div class="col-lg-4">
	<p><a href="<?php echo Yii::app()->baseUrl;?>/user/update/<?php echo $model->id ?>" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Uppdatera användaruppgifter");?></a></p>
</div>
<div class="col-lg-4">
	<p><a href="<?php echo Yii::app()->baseUrl;?>/cv/create" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Ladda upp nytt CV");?></a></p>
</div>
<div class="col-lg-4">
	<p><a href="<?php echo Yii::app()->baseUrl;?>/cv/admin" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Mina CV:n");?></a></p>
</div>
<?php endif; ?>
<?php if(isset($rmodel)): ?>
	<?php $this->widget('zii.widgets.CDetailView',array(
	    'htmlOptions' => array(
	        'class' => 'table table-striped table-condensed table-hover',
	    ),
	    'data'=>$model,
		'attributes'=>array(
			'username',
			'name',
			'email',
			array(
			'label' => t('Företagsnamn'),
      		'value' => $rmodel->orgName,
      		),
      		array(
      		'label' => t('VAT-nr'),
			'value' => $rmodel->VAT,
			),
		),
	)); ?>
	<div class="col-lg-4">
		<p><a href="<?php echo Yii::app()->baseUrl;?>/user/update/<?php echo $model->id ?>" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Uppdatera användaruppgifter");?></a></p>
	</div>
	<div class="col-lg-4">
		<p><a href="<?php echo Yii::app()->baseUrl;?>/recruitmentprocess/create" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Skapa ny process");?></a></p>
	</div>
	<div class="col-lg-4">
		<p><a href="<?php echo Yii::app()->baseUrl;?>/cv" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Sök på CV:n");?></a></p>
	</div>
<?php endif; ?>