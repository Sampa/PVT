<?php
/* @var $this CvController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Cvs',
);

$this->menu=array(
	array('label'=>'Create Cv','url'=>array('create')),
	array('label'=>'Manage Cv','url'=>array('admin')),
);
?>

<h1>Cvs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>