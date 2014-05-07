<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
     'Rekryteringsprocesser'=>array('index'),
    Yii::t('t','Ny rekrytering'),

);

$this->menu=array(
	array('label'=>'List Recruitmentprocess', 'url'=>array('index')),
	array('label'=>'Manage Recruitmentprocess', 'url'=>array('admin')),
);
?>

<h1>Skapa ny rekryteringsprocess</h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>