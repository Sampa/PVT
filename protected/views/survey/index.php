<?php
/* @var $this SurveyController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	t('Enkäter'),
);

$this->menu=array(
	array('label'=>t('Skapa enkäter'),'url'=>array('create')),
	array('label'=>t('Hantera enkäter'),'url'=>array('admin')),
);
?>

<h1>Surveys</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>