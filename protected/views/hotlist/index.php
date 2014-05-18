<?php
/* @var $this HotlistController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Hotlists',
);

$this->menu=array(
	array('label'=>'Create Hotlist','url'=>array('create')),
	array('label'=>'Manage Hotlist','url'=>array('admin')),
);
?>

    <div class="page-header">
        <h1><?php echo Yii::t("t", "Titelns+ Favoriter");?> </h1>
    </div>
    <p><?php echo Yii::t("t", "Här presenteras de cv:n som du valt att lägga till dina favoriter som hör till [titel] rekryteringen. ");?> <br><br> </p>
    <h3> <?php echo Yii::t('t', 'Sortera på:');?> </h3>
    <div class="btn-group">
        <button id="rating" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Rangordning');?>Middle</button>
        <!---"rating" är inte kopplad till "rating" i databasen--->
        <button id="date" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Datum');?></button>
        <button id="typeOfEmployment" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Anställningsform');?></button>
        <!--- <button id="geograficArea" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Geografisk area');?></button>-->
    </div>

<?php $this->widget('bootstrap.widgets.TbListView',array(
        'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>