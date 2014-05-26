<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	t("Hem")=> Yii::app()->getHomeUrl(),
		t("Användare")=>array('index'),
);

$this->menu=array(
	array('label'=>t('Skapa användare'),'url'=>array('create')),
	array('label'=>t('Hantera användare'),'url'=>array('admin')),
);
?>

<h1><?php echo t('Användare');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>