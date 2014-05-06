<?php
/* @var $this HotlistController */
/* @var $data Hotlist */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cvId')); ?>:</b>
	<?php echo CHtml::encode($data->cvId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rpId')); ?>:</b>
	<?php echo CHtml::encode($data->rpId); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('raiting')); ?>:</b>
    <?php echo CHtml::encode($data->raiting); ?>
    <br />


</div>
<article class="search-result row">
    <div class="col-xs-12 col-sm-12 col-md-3">
        <a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->cv->pathToPdf); ?>" title="Lorem ipsum" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/CVicon.png" /></a>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3">

        <?php for($r = 0; $r < $data->raiting; $r++){?>
            <i class="glyphicon glyphicon-star"></i>
        <?php } ?><span>rang</span>
        <ul class="meta-search">


            <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
            <li><i class="glyphicon glyphicon-tags"></i> <span>People</span></li>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 excerpet">
        <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
    </div>
    <span class="clearfix borda"></span>
</article>