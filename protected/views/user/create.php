<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	t('Användare');=>array('index'),
	t('Skapa');,
);

$this->menu=array(
	array('label'=>t('Lista användare');, 'url'=>array('index')),
	array('label'=>t('Hantera användare');, 'url'=>array('admin')),
);
?>

<h1><?php echo t('Skapa användare'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>