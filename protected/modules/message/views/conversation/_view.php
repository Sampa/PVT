<?php
/* @var $this ConversationController */
/* @var $data Conversation */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recruiterId')); ?>:</b>
	<?php echo CHtml::encode($data->recruiterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisherId')); ?>:</b>
	<?php echo CHtml::encode($data->publisherId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>