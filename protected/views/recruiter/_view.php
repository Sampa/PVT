<?php
/* @var $this RecruiterController */
/* @var $data Recruiter */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('userId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userId),array('view','id'=>$data->userId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VAT')); ?>:</b>
	<?php echo CHtml::encode($data->VAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orgName')); ?>:</b>
	<?php echo CHtml::encode($data->orgName); ?>
	<br />


</div>