<?php
/* @var $this CvController */
/* @var $model Cv */
?>

<?php
$this->breadcrumbs=array(
	'Cvs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cv', 'url'=>array('index')),
	array('label'=>'Create Cv', 'url'=>array('create')),
	array('label'=>'View Cv', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cv', 'url'=>array('admin')),
);
?>

    <h1>Update Cv <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>