<?php
/* @var $this HotlistController */
/* @var $model Hotlist */
?>

<?php
$this->breadcrumbs=array(
	'Hotlists'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Hotlist', 'url'=>array('index')),
	array('label'=>'Create Hotlist', 'url'=>array('create')),
	array('label'=>'Update Hotlist', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Hotlist', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hotlist', 'url'=>array('admin')),
);
?>

<h1>View Hotlist #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'cvId',
		'rpId',
		'id',
	),
)); ?>