<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs=array(
	t("Hem")=> Yii::app()->getHomeUrl(),
		t("Användare")=>array('index'),
		t("Hantera"),
);

$this->menu=array(
	array('label'=>t('Lista användare'), 'url'=>array('index')),
	array('label'=>t('Skapa användare'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo t('Hantera användare');?></h1>

<p>
    <?php echo t('Du har möjligheten att använda jämförelseoperatorerna '); ?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
<?php echo t('eller');?><b>=</b>) <?php echo t('i början av varje sökvärde för att bestämma hur jämförelserna ska göras.');?>
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'username',
		'email',
        'create_time',
        'login_attempts',
        'status',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>