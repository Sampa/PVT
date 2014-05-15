<?php
/* @var $this SurveyController */
/* @var $model Survey */

$this->breadcrumbs=array(
	t('Enkäter')=>array('index'),
	t('Hantera'),
);
?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'survey-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'date',

		'buttons'=>array(
			'header' => 'Alternativ',
			'class'=>'TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 250px'),
			'viewButtonIcon'=>'glyphicon glyphicon-eye-open',
			'deleteButtonIcon'=>'glyphicon glyphicon-trash',
            'updateButtonIcon'=>'glyphicon glyphicon-eye-open',
		),
	),
)); ?>