<?php
/* @var $this CvController */
/* @var $data Cv */
?>

<div class="view">



    	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->publisher->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pathToPdf')); ?>:</b>
    <a href="<?php echo CHtml::encode($data->pathToPdf); ?>" rel="pdf"><?php echo Yii::t("t","Öppna cv");?></a>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeOfEmployment')); ?>:</b>
	<?php echo CHtml::encode($data->typeOfEmployment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geographicAreaId')); ?>:</b>
	<?php echo CHtml::encode($data->geographicAreaId); ?>
	<br />
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pdfText')); ?>:</b>
	<?php echo CHtml::encode($data->pdfText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisherId')); ?>:</b>
	<?php echo CHtml::encode($data->publisherId); ?>
	<br />

	*/ ?>

</div>