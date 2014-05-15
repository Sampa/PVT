<?php
/* @var $this SurveyController */
/* @var $model Survey */

$this->breadcrumbs=array(
	t('Hem') => Yii::app()->getHomeUrl(),
	t('Enkäter'),
);
?>

  <div align="right">
      <a href="<?php echo Yii::app()->baseUrl;?>/survey/create">
      <span class="glyphicon glyphicon-plus"></span>  <?php echo Yii::t("t","Skapa ny enkät");?>
      </a>

    </div>

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