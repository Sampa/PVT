<?php
/* @var $this RecruiterController */
/* @var $model Recruiter */
?>

<?php
$this->breadcrumbs=array(
	'Recruiters'=>array('index'),
	$model->userId,
);

$this->menu=array(
	array('label'=>'List Recruiter', 'url'=>array('index')),
	array('label'=>'Create Recruiter', 'url'=>array('create')),
	array('label'=>'Update Recruiter', 'url'=>array('update', 'id'=>$model->userId)),
	array('label'=>'Delete Recruiter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recruiter', 'url'=>array('admin')),
);
?>

<h1>View Recruiter #<?php echo $model->userId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'VAT',
		'userId',
		'orgName',
	),
)); ?>