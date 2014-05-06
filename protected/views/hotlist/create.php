<?php
/* @var $this HotlistController */
/* @var $model Hotlist */
?>

<?php
$this->breadcrumbs=array(
	'Hotlists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Hotlist', 'url'=>array('index')),
	array('label'=>'Manage Hotlist', 'url'=>array('admin')),
);
?>

<h1>Create Hotlist</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>