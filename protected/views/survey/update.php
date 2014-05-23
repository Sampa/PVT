<?php
/* @var $this SurveyController */
/* @var $model Survey */
?>

<?php
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    t('Enkäter')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	t('Update'),
);

?>

    <h1>Update Survey <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>