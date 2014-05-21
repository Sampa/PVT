    <?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */


$this->breadcrumbs=array(
	t('Rekryteringsprocesser')=>array('index'),
	t('Hantera'),
);

$this->menu=array(
	array('label'=>'List Recruitmentprocess', 'url'=>array('index')),
	array('label'=>'Create Recruitmentprocess', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#recruitmentprocess-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo t("Hantera Reryteringsprocesser");?></h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

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