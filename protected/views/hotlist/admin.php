<?php
/* @var $this HotlistController */
/* @var $model Hotlist */


$this->breadcrumbs=array(
	'Hotlists'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Hotlist', 'url'=>array('index')),
	array('label'=>'Create Hotlist', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hotlist-grid').yiiGridView('up ate', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo t("Manage Hotlists");?></h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'hotlist-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cvId',
		'rpId',
		'id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>