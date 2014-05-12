<?php
/* @var $this UserController */
/* @var $model User */
?>
<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Updatera användaruppgifter',
);
?>
    <div class="page-header">
        <h1><?php echo Yii::t("t", "Uppdatera användaruppgifter");?></h1>
    </div>

<?php $this->renderPartial('_form', array('model'=>$model, 'rmodel' => $rmodel,)); ?>