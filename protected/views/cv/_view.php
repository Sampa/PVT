<?php
/* @var $this CvController */
/* @var $data Cv */
?>

<!-- <div class="view">

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
   				<a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->pathToPdf); ?>" rel="pdf"><?php echo Yii::t("t","Öppna cv");?></a>
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
	</table> -->

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pdfText')); ?>:</b>
	<?php echo CHtml::encode($data->pdfText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisherId')); ?>:</b>
	<?php echo CHtml::encode($data->publisherId); ?>
	<br />

	*/ ?>
<div class="container">



    <section class="col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->pathToPdf); ?>" title="Lorem ipsum" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/CVicon.png" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo CHtml::encode($data->date); ?></span></li>
					<li><i class="glyphicon glyphicon-briefcase"></i> <span><?php echo CHtml::encode($data->typeOfEmployment); ?></span></li>
					<li><i class="glyphicon glyphicon-globe"></i> <span><?php echo CHtml::encode($data->geographicAreaId); ?></span></li>
					<li><i class="glyphicon glyphicon-user"></i> <span><?php echo CHtml::encode($data->publisher->username); ?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3><a href="#" title=""><?php echo CHtml::link(CHtml::encode($data->title),array('view','id'=>$data->id)); ?></a></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
			</div>
			<span class="clearfix borda"></span>
		</article>



	</section>
</div>

