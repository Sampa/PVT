<?php
/* @var $this CvController */
/* @var $model Cv */


$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
	'CV'=>array('index'),
    	Yii::t("t",'Hantera dina CV:n'),
    );
?>
<div class="page-header">
        <h1><?php echo Yii::t("t",'Dina publicerade CV:n');?></h1>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cv-grid',
	'type' => 'striped',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'Date',
			'name' => 'date',
			'value' => 'substr($data->date, 0, 10)',
			),
		'typeOfEmployment',
		'title',
		'buttons'=>array(
			'class'=>'TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 250px'),
            'viewButtonIcon'=>'glyphicon glyphicon-eye-open',
            'deleteButtonIcon'=>'glyphicon glyphicon-trash',
//            'updateButtonIcon'=>'glyphicon glyphicon-eye-open',
        ),
	),
)); ?>