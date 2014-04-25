<?php
/* @var $this CvController */
/* @var $data Cv */
?>

<div class="view">

	<table class="table table-hover">
		<tr>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
				<?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id)); ?>
		 	</td>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:
				<?php echo CHtml::encode($data->date); ?>
		 	</td>		
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('pathToPdf')); ?>:
   				<a href="<?php echo Yii::app()->baseUrl."".CHtml::encode($data->pathToPdf); ?>" rel="pdf"><?php echo Yii::t("t","Öppna cv");?></a>
		 	</td>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('typeOfEmployment')); ?>:
				<?php echo CHtml::encode($data->typeOfEmployment); ?>
		 	</td>
		 	<td>
		 		<?php echo CHtml::encode($data->getAttributeLabel('geographicAreaId')); ?>:
				<?php echo CHtml::encode($data->geographicAreaId); ?>
		 	</td>
		</tr>
	</table>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pdfText')); ?>:</b>
	<?php echo CHtml::encode($data->pdfText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisherId')); ?>:</b>
	<?php echo CHtml::encode($data->publisherId); ?>
	<br />

	*/ ?>

</div>