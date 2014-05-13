<?php
/* @var $this CvController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Avancerad sökning'),
);
?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/select2.css" media="screen"/>

    <?php if (Yii::app()->user->hasFlash('index')): ?>
        <div class="alert alert-info  alert-dismissable">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong><?php echo Yii::app()->user->getFlash('index'); ?></strong>
        </div>
    <?php else: ?>
<!--        <div class="page-header">-->
<!--            <h1>--><?php //echo Yii::t("t", "Avancerad sökning");?><!-- </h1>-->
<!--        </div>-->
        <div class="horizontal-form">

<form class="form" role="search" name="search" method="post" >
	<div class="form-group">
        <label for="searchbox"><?php echo Yii::t("t","Valfria sökord");?></label>
		<input id="searchbox" type="text" name="searchbox" class="form-control" placeholder="<?php echo Yii::t("t","Fritextsökning...");?>" />
	</div>
    <div class="form-group row col-md-6"  style="margin-left:-15px;margin-top:0px;margin-bottom: 15px;">
        <label for="searchTags"><?php echo Yii::t("t","Nyckelord");?></label>
        <input class="form-control" name="tags" id="searchTags" type="text"/>
    </div>
    <span class="clearfix"></span>
  <div class="checkbox">
      <input id="consultOption" name="consult" type="checkbox"/> <?php echo Yii::t("t","Sök efter konsultuppdrag");?><br>
      <input name="employment" type="checkbox"/> <?php echo Yii::t("t","Sök efter tillsvidareanställning");?>
  </div>
  <div>
    <?php $this->renderPartial('_allCountriesSelect', array('')); ?>
  </div>
  <div style="margin-top:15px;">
    <button type="submit" class="btn btn-primary"><?php echo Yii::t("t","Sök");?></button>
  </div>
</form>
<hr/>
<h3 id="results"> <?php echo Yii::t('t', 'Sortera på:');?> </h3>
    <div class="btn-group">
          <button id="title" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Rubrik');?></button>
          <button id="date" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Datum');?></button>
          <button id="typeOfEmployment" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Anställningsform');?></button>
          <!--- <button id="geograficArea" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Geografisk area');?></button>-->
   </div>
    <div class="well" style="display:none;" id="sortSelectionWrapper"><h4><?php echo Yii::t("t","Sorterade listan efter ");?><span id="sortSelection"></span></h4></div>
            <hr>
<?php
if($resultCount< 1):?>
    <div class="alert alert-info"><?php echo Yii::t("t","Inga sökresultat hittades så vi visar alla");?></div>
<?php endif;?>
<div id="listOfCvs">
	<?php
	    $this->widget('bootstrap.widgets.TbListView',array(
	    'dataProvider'=>$dataProvider,
         'itemView'=>'_view',
         'afterAjaxUpdate'=>'scrollToResults',
	    ));
	?>
</div><!-- form -->
    <?php endif;?>
<?php

?>
<script>
    function scrollToResults(i,data){
        $('html, body').animate({
                scrollTop: $("#results").offset().top
            }, 2000);
    }

jQuery(document).ready(function ($) {

    jQuery("#searchTags").select2({
        tags:<?php echo json_encode(Tag::getTagsAsString());?>
    });
	jQuery("#geoRegion   ").on("change",function(){
		if ( $(this).val() == "default" ) {
			$("#geographicAreaForm").fadeOut();
		}else {
			$("#geographicAreaForm").fadeIn();
		}
	});
    /*
    * När man vill spara ett CV till en hotlist
    */
    jQuery(".listOfProcesses").on("click", function(){
        var processID = $(this).attr("id");
        var cvID = $(this).parent().attr("id");
        console.log( processID + cvID );
        $.ajax({  //gör en http POST request till vår actionSaveCV i RecruitmentprocessController och skicka med datan
            type: "POST",
            url: "recruitmentprocess/savecv",
            data: {"processID":processID, "cvID":cvID}
        }).done(function( data ) {
            console.log( data );
            alert( data );
        });
    });
	jQuery(".sortButton").on("click",function(){
            var post = <?php echo json_encode($_POST);?>;
            post.sortBy = $(this).attr("id");
            $.ajax({
                type: "POST",
                url: "cv/",
                data: post
            }).done(function( data ) {
                document.querySelector("#listOfCvs").innerHTML = "";
                $("#listOfCvs").html(data);
                $("#sortSelectionWrapper").fadeIn('slow');
                var displayText ="anställningsform";
                switch(post.sortBy){
                    case "date":
                        displayText ="datum";
                    break;
                    case "title":
                        displayText = "rubrik";
                }
                $("#sortSelection").html(displayText);
            });
        });
});
</script>





