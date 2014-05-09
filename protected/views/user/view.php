<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
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
			'fullname',
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
	<p><a href="<?php echo Yii::app()->baseUrl;?>/cv/admin" class="btn btn-info btn-btn btn-block" href="#"><?php echo Yii::t("t","Dina CV:n");?></a></p>
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
			'fullname',
			'email',
			array(
			'label' => 'Företagsnamn',
      		'value' => $rmodel->orgName,
      		),
      		array(
      		'label' => 'VAT-nr',
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