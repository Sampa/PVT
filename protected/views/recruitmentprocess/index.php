<?php
/* @var $this RecruitmentprocessController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Recruitmentprocesses',
);

$this->menu=array(
	array('label'=>'Create Recruitmentprocess','url'=>array('create')),
	array('label'=>'Manage Recruitmentprocess','url'=>array('admin')),
);
?>

<h1>Rekryteringsprocesser</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>