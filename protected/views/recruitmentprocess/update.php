<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
?>

<?php
$this->breadcrumbs=array(
	t('Rekryteringsprocesser')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	t('Uppdatera'),
);

$this->menu=array(
	array('label'=>'List Recruitmentprocess', 'url'=>array('index')),
	array('label'=>'Create Recruitmentprocess', 'url'=>array('create')),
	array('label'=>'View Recruitmentprocess', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Recruitmentprocess', 'url'=>array('admin')),
);
?>

    <h1><?php echo t("Update Recruitmentprocess").$model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>