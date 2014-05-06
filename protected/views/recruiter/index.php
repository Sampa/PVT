<?php
/* @var $this RecruiterController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Recruiters',
);

$this->menu=array(
	array('label'=>'Create Recruiter','url'=>array('create')),
	array('label'=>'Manage Recruiter','url'=>array('admin')),
);
?>

<h1>Recruiters</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>