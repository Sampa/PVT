<?php
/* @var $this UserController */
/* @var $model User */
?>
<?php
$this->breadcrumbs=array(
	t('Användare')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	t('Ändra uppgifter'),
);
?>
    <div class="page-header">
        <h1><?php echo Yii::t("t", "Ändra uppgifter");?></h1>
    </div>

<?php $this->renderPartial('_form', array('model'=>$model, 'rmodel' => $rmodel,)); ?> 