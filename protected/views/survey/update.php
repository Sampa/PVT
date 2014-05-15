<?php
/* @var $this SurveyController */
/* @var $model Survey */
?>

<?php
$this->breadcrumbs=array(
	t('Enkäter')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Survey', 'url'=>array('index')),
	array('label'=>'Create Survey', 'url'=>array('create')),
	array('label'=>'View Survey', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Survey', 'url'=>array('admin')),
);
?>

    <h1>Update Survey <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>