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
	t('Updatera användaruppgifter'),
);
} else{
	$this->breadcrumbs=array(
	t("Hem")=> Yii::app()->getHomeUrl(),
	$model->name=>array('view','id'=>$model->id),
	t('Updatera användaruppgifter'),
);
}
?>
<?php $this->renderPartial('_form', array('model'=>$model, 'rmodel' => $rmodel,)); ?>