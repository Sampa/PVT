<?php
/* @var $this RecruitmentprocessController */
/* @var $data Recruitmentprocess */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recruiterId')); ?>:</b>
	<?php echo CHtml::encode($data->recruiterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endDate')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeOfService')); ?>:</b>
	<?php echo CHtml::encode($data->typeOfService); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('typeOfEmployment')); ?>:</b>
	<?php echo CHtml::encode($data->endDate); ?>
	<br />
</div>