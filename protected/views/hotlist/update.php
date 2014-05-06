<?php
/* @var $this HotlistController */
/* @var $model Hotlist */
?>

<?php
$this->breadcrumbs=array(
	'Hotlists'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hotlist', 'url'=>array('index')),
	array('label'=>'Create Hotlist', 'url'=>array('create')),
	array('label'=>'View Hotlist', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Hotlist', 'url'=>array('admin')),
);
?>

    <h1>Update Hotlist <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>