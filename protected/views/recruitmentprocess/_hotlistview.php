<?php
/* @var $this RecruitmentprocessController */
/* @var $data Hotlist */
?>

<div class="view">
	hello
   	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

</div>