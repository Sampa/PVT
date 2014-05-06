<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
?>

<?php
$this->breadcrumbs=array(
	'Recruitmentprocesses'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recruitmentprocess', 'url'=>array('index')),
	array('label'=>'Create Recruitmentprocess', 'url'=>array('create')),
	array('label'=>'View Recruitmentprocess', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Recruitmentprocess', 'url'=>array('admin')),
);
?>

    <h1>Update Recruitmentprocess <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>