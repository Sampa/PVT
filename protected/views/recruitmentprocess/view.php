<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
     'Rekryteringsprocesser'=>array('index'),
    $model->title,

);


$this->menu=array(
	array('label'=>'List Recruitmentprocess', 'url'=>array('index')),
	array('label'=>'Create Recruitmentprocess', 'url'=>array('create')),
	array('label'=>'Update Recruitmentprocess', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Recruitmentprocess', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recruitmentprocess', 'url'=>array('admin')),
);
?>
 <div class="page-header">
<h1><?php echo Yii::t('t', 'Visar '),$model->title; ?></h1>
</div>

<div class="row">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Typ av tjänst: </strong>"), "<span style='margin-left:52px'> $model->typeOfService</span>"?></div>
  <div class="col-xs-6 col-sm-4"></div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
</div>

<div class="row">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Anställningsform: </strong>"),"<span style='margin-left:20px'> $model->typeOfEmployment</span>"?></div>

</div>
<div class="row">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Startdatum: </strong>"),"<span style='margin-left:60px'> $model->startDate</span>"?></div>
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Slutdatum:</strong>"),"<span style='margin-left:55px'>$model->endDate</span>"?></div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-6 col-sm-4">.col-xs-6 .col-sm-4</div>
</div>

<div class="row">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Geografisk plats: </strong>"),"<span style='margin-left:29px'> $model->geographicAreaID</span>"?></div>

</div>
<h3><?php echo Yii::t("t","Mina kommentarer");?></h3>
<textarea class="form-control" rows="3"></textarea>
<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'title',
		'recruiterId',
		'endDate',
		'typeOfService',
		'typeOfEmployment'
	),
)); ?>