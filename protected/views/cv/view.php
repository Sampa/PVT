<?php
/* @var $this CvController */
/* @var $model Cv */
?>

<?php
$this->breadcrumbs=array(
	'Cvs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Cv', 'url'=>array('index')),
	array('label'=>'Create Cv', 'url'=>array('create')),
	array('label'=>'Update Cv', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cv', 'url'=>array('admin')),
);
?>

<h1>View Cv #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'showUserDetail',
		'date',
		'pathToPdf',
		'typeOfEmployment',
		'geographicAreaId',
		'title',
		'pdfText',
		'publisherId',
	),
)); ?>