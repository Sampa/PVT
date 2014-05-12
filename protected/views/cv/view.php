<?php
/* @var $this CvController */
/* @var $model Cv */
?>

<?php
$this->breadcrumbs=array(
	'CV'=>array('index'),
	$model->title,
);

?>

<h1><?php echo $model->title; ?></h1>
<a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($model->pathToPdf); ?>" rel="pdf">
    <?php echo Yii::t("t","Öppna cv");?>
</a>
<?php
foreach($model->cvTags as $cvTag){
    echo "<br/>";
    $number = $cvTag->tag->frequency+30;
    echo '<span style="font-size:'.$number.'px">'.$cvTag->tag->name.'</span>';
    echo "<br/>";
}
?>
<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
        'date',
        'typeOfEmployment',
        'geographicAreaId',
        'pdfText',
        'publisherId'
    ),
)); ?>