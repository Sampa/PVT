<?php
/* @var $this CvController */
/* @var $model Cv */
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t","Mina Sidor")=>Yii::app()->getBaseUrl().'/user/'.app()->user->id,
	Yii::t("t",'Skapa nytt CV'),
);

?>
	

	<?php $this->renderPartial('_form', array('model'=>$model,'pdf'=>$pdf)); ?>
