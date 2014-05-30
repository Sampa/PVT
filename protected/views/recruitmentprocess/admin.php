    <?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */


$this->breadcrumbs=array(
	t('Rekryteringsprocesser')=>array('index'),
	t('Hantera'),
);
?>

<h1><?php echo t("Hantera Reryteringsprocesser");?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'recruitmentprocess-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'recruiterId',
		'endDate',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>