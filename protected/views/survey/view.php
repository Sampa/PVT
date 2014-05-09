<?php
/* @var $this SurveyController */
/* @var $model Survey */
?>

<?php
$this->breadcrumbs=array(
	'Surveys'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Survey', 'url'=>array('index')),
	array('label'=>'Create Survey', 'url'=>array('create')),
	array('label'=>'Update Survey', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Survey', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Survey', 'url'=>array('admin')),
);
?>

<h1>View Survey #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'recruiterID',
		'title',
		'date',
	),
)); ?>