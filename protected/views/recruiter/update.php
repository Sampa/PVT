<?php
/* @var $this RecruiterController */
/* @var $model Recruiter */
?>

<?php
$this->breadcrumbs=array(
	'Recruiters'=>array('index'),
	$model->userId=>array('view','id'=>$model->userId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recruiter', 'url'=>array('index')),
	array('label'=>'Create Recruiter', 'url'=>array('create')),
	array('label'=>'View Recruiter', 'url'=>array('view', 'id'=>$model->userId)),
	array('label'=>'Manage Recruiter', 'url'=>array('admin')),
);
?>

    <h1>Update Recruiter <?php echo $model->userId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>