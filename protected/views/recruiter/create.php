<?php
/* @var $this RecruiterController */
/* @var $model Recruiter */
?>

<?php
$this->breadcrumbs=array(
	'Recruiters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Recruiter', 'url'=>array('index')),
	array('label'=>'Manage Recruiter', 'url'=>array('admin')),
);
?>

<h1>Create Recruiter</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>