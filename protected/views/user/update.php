<?php
/* @var $this UserController */
/* @var $model User */
?>
<?php
if(Yii::app()->user->id ==1){
$this->breadcrumbs=array(
	t("Hem")=> Yii::app()->getHomeUrl(),
	t('Användare')=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	t('Ändra uppgifter'),
);
} else{
	$this->breadcrumbs=array(
	t("Hem")=> Yii::app()->getHomeUrl(),
	t('Användare'),
	$model->name=>array('view','id'=>$model->id),
	t('Updatera användaruppgifter'),
);
}
?>

    <div class="page-header">
        <h1><?php echo Yii::t("t", "Ändra uppgifter");?></h1>
    </div>

<?php $this->renderPartial('_form', array('model'=>$model, 'rmodel' => $rmodel,)); ?> 



