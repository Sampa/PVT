
<div id="portfolio">
<h3><?php echo Yii::t('main','Images');?></h3>
<?php
    $imageFolder = "images/portfolio/"; 
    foreach(glob($imageFolder.'*') as $image){ //search our images/portfolio folder for images        
        $filename = str_replace($imageFolder,"",$image); //extract the filename+extension only
        $thumbnail = $imageFolder."thumbnails/".$filename; // thumbnail path
        if(is_file($image)){ //make sure no folder or such is included 
            if(!is_file($thumbnail)){ //if there is no thumbnail create one
                $crop = new EasyImage($imageFolder.$filename); //the image
                $crop->resize(75, 75); //new size
                $crop->save($imageFolder."thumbnails/".$filename); //save to thumbnail
            }
            //echo the thumbnail as a link to the full size image and set title to the filename only
        	echo CHtml::link(CHtml::tag('img',array(    	    	
    	    	'src'=>$thumbnail,
    	    	'alt'=>$image,
    	    	)),$image,array('title'=>str_replace(array($imageFolder,'.png','.jpg','.jpeg','.gif'),"",$image)));        
	   }
    }?>
  <a href="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg" title="The Cleaner"><img src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_s.jpg" height="75" width="75"></a>
    <a href="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg" title="Winter Dance"><img src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_s.jpg" height="75" width="75"></a>
    <a href="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg" title="The Uninvited Guest"><img src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_s.jpg" height="75" width="75"></a>
    <a href="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg" title="Oh no, not again!"><img src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_s.jpg" height="75" width="75"></a>
    <a href="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_b.jpg" title="Swan Lake"><img src="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_s.jpg" height="75" width="75"></a>
    <a href="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_b.jpg" title="The Shake"><img src="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_s.jpg" height="75" width="75"></a>
</div>
<h3><?php echo Yii::t('main','Videos');?></h3>
<?php 
    $models = Video::model()->findAll();
    foreach($models as $model){
        $videoId = str_replace("http://www.youtube.com/watch?v=", "", $model->url);
        echo CHtml::link(
            CHtml::tag('img',array(
                'src'=>"http://img.youtube.com/vi/".$videoId."/default.jpg",
                "title"=>$model->title,
                "height"=>"75px",
                "width"=>"75px",
                )),$model->url,array('class'=>'youtube'));
    }

    if(!Yii::app()->user->isGuest){
        $this->widget('bootstrap.widgets.TbFileUpload', array(
            'url' => $this->createUrl("site/upload"),
            'model' => new Post(),
            'downloadTemplate'=>"false",
            'attribute' => 'picture', 
            'multiple' => true,
            'options' => array(
                'autoUpload'=>true,
                'maxFileSize' => 2000000,
                'completed' => 'js:function (e,data) {portfolioUploadCallback(e,data);}',
                'dropZone'=>'#dropZone',
                'acceptFileTypes' => 'js:/(\.|\/)(gif|jpe?g|png)$/i',
                'htmlOptions'=>'margin-left:30px; padding: 0px;',
        ))); 

        echo CHtml::link('<i class="icon-plus"></i> Add video', '/video/create',array('class'=>'btn btn-success','style'=>'position:relative;top:-25px;'));
    }
?>

<script>

$(document).ready(function() {
    $('.youtube').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
    $('#portfolio').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title') + '<small>&copy; Linn Oscarsson</small>';
            }
        }
    });
});
</script>
