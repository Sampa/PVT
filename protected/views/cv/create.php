<?php
/* @var $this CvController */
/* @var $model Cv */
?>

<?php
$this->breadcrumbs=array(
	'Cvs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cv', 'url'=>array('index')),
	array('label'=>'Manage Cv', 'url'=>array('admin')),
);
?>

<h1><?php echo yii::t("t",'Skapa ditt Cv');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'pdf'=>$pdf)); ?>