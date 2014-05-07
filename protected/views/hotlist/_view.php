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
    <b><?php echo CHtml::encode($data->getAttributeLabel('typeOfEmployment')); ?>:</b>
    <?php echo CHtml::encode($data->cv->typeOfEmployment); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('geographicAreaId')); ?>:</b>
    <?php echo CHtml::encode($data->cv->geographicAreaId); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
    <?php echo CHtml::encode($data->cv->date); ?>
    <br />


</div>
<article class="search-result row">
    <div class="col-xs-12 col-sm-12 col-md-3">
        <?php
        if($data->raiting == 3){?>
        <a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->cv->pathToPdf); ?>" title="Lorem ipsum" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/YellowSmily.jpg" /></a>
       <?php }
        else if($data->raiting == 1 || $data->raiting == 2){?>
            <a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->cv->pathToPdf); ?>" title="Lorem ipsum" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/RedSmily.png" /></a>
         <?php }
         else{ ?>
             <a href="<?php echo Yii::app()->baseUrl."/".CHtml::encode($data->cv->pathToPdf); ?>" title="Lorem ipsum" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/GreenSmily.jpg" /></a>
        <?php }?>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-3">

        <?php for($r = 0; $r < $data->raiting; $r++){?>
            <i class="glyphicon glyphicon-star"></i>
        <?php } ?><span>rang</span>
        <ul class="meta-search">



            <li><i class="glyphicon glyphicon-calendar"></i> <span><?php echo CHtml::encode($data->cv->date); ?></span></li>
            <li><i class="glyphicon glyphicon-briefcase"></i> <span><?php echo CHtml::encode($data->cv->typeOfEmployment); ?></span></li>
            <?php
            //DB Query to get the country name.
            if(isset($data->cv->geographicArea->country)){
                $countryName = $data->cv->geographicArea->country;
            }else
                $countryName = null;
            ?>
            <li><i class="glyphicon glyphicon-globe"></i> <span><?= $countryName; ?></span></li>
            <li><i class="glyphicon glyphicon-user"></i> <span><?php echo CHtml::encode($data->cv->publisher->username); ?></span></li>
        </ul>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 excerpet">
        <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
    </div>
    <span class="clearfix borda"></span>
</article>