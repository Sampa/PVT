<?php
/* @var $this HotlistController */
/* @var $data Hotlist */
/* @var $hotlistRating HotlistRating */
?>

<div class="view">

 

</div>
<!--<article class="search-result row">


<!--     <div class="col-xs-12 col-sm-12 col-md-1">
    </div> -->
    <div class="row">
        <div class="col-md-1">
 <!--   <article class="search-result row"> -->
    <p> <?php echo Yii::t('t','Markera');?> </p>

        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'switchbuttontest'));?>
        </div>
        <div class="col-md-2">
            <a href="" title="Lorem ipsum" class="thumbnail"><img src="<?php echo Yii::app()->baseUrl;?>/img/YellowSmily.jpg" /></a>
        </div>
<!--        -->
<!--  <!--      <div class="col-xs-12 col-sm-12 col-md-2">-->
<!--<!--        --><?php
//        if($data->hotlistRating->rating == 3){?>
<!--        <a href="--><?php //echo Yii::app()->baseUrl."/".CHtml::encode($data->cv->pathToPdf); ?><!--" title="Lorem ipsum" class="thumbnail"><img src="--><?php //echo Yii::app()->baseUrl;?><!--/img/YellowSmily.jpg" /></a>-->
<!--       --><?php //}
//        else if($data->hotlistRating->rating == 1 || $data->hotlistRating->rating == 2){?>
<!--            <a href="" title="Lorem ipsum" class="thumbnail"><img src="--><?php //echo Yii::app()->baseUrl;?><!--/img/RedSmily.png" /></a>-->
<!--         --><?php //}
//         else{ ?>
<!--             <a href="--><?php //echo Yii::app()->baseUrl."/".CHtml::encode($data->cv->pathToPdf); ?><!--" title="Lorem ipsum" class="thumbnail"><img src="--><?php //echo Yii::app()->baseUrl;?><!--/img/GreenSmily.jpg" /></a>-->
<!--        --><?php //}?>

 <!--   </div>
    <div class="col-xs-12 col-sm-12 col-md-2">

<!--        --><?php //for($r = 0; $r < $data->hotlistRating->rating; $r++){?>
<!--            <i class="glyphicon glyphicon-star"></i>-->
<!--        --><?php //} ?><!--<span>rang</span>-->
       <div class="col-md-2">
        <ul class="meta-search">
<!--            <li><i class="glyphicon glyphicon-calendar"></i> <span>--><?php //echo substr(CHtml::encode($data->cv->date),0,10); ?><!--</span></li>-->
<!--            <li><i class="glyphicon glyphicon-briefcase"></i> <span>--><?php //echo CHtml::encode($data->cv->typeOfEmployment); ?><!--</span></li>-->
            <?php
            //DB Query to get the country name.
            if(isset($data->cv->geographicArea->country)){
                $countryName = $data->cv->geographicArea->country;
            }else
                $countryName = null;
            ?>
            <li><i class="glyphicon glyphicon-globe"></i> <span><?= $countryName; ?></span></li>
<!--            <li><i class="glyphicon glyphicon-user"></i> <span>--><?php //echo CHtml::encode($data->cv->publisher->username); ?><!--</span></li>-->
        </ul>
    </div>
    <div class="col-md-7" style="margin-top:-22px">
        <p></p>
        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-comment"></i></a></span><span><?php echo Yii::t("t"," Chatt");?></span>
        <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-file"></i></a></span><span><?php echo Yii::t("t"," Enkät");?></span>
  <!--  </div> -->
</div>
</div>
    <span class="clearfix borda"></span>
</article>