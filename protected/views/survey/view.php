<?php
/* @var $this SurveyController */
/* @var $model Survey */
?>

<?php
$this->breadcrumbs=array(
	t('Enkäter')=>array('index'),
	$model->title,
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