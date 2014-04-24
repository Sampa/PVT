<?php
/* @var $this CvController */
/* @var $model Cv */


$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
	'CV'=>array('index'),
    	Yii::t("t",'Hantera dina CV:n'),
    );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cv-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
        <h1><?php echo Yii::t("t",'Dina publicerade CV:n');?></h1>
    </div>

<p>
   <?php echo Yii::t("t"," Här kan du se på alla dina publicerade CV:n och ta bort de du inte vill ha kvar.");?>
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cv-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'showUserDetail',
		'typeOfEmployment',
		'title',
		'buttons'=>array(
			'class'=>'TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 250px'),
            'viewButtonIcon'=>'glyphicon glyphicon-search',
            'deleteButtonIcon'=>'glyphicon glyphicon-remove',
//            'updateButtonIcon'=>'glyphicon glyphicon-eye-open',
        ),
	),
)); ?>