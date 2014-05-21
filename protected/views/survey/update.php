<?php
/* @var $this SurveyController */
/* @var $model Survey */
?>

<?php
$this->breadcrumbs=array(
	t('Enkäter')=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	t('Update'),
);

?>

    <h1>Update Survey <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>