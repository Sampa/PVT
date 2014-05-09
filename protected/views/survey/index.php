<?php
/* @var $this SurveyController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Surveys',
);

$this->menu=array(
	array('label'=>'Create Survey','url'=>array('create')),
	array('label'=>'Manage Survey','url'=>array('admin')),
);
?>

<h1>Surveys</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>