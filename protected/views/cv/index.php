<?php
/* @var $this CvController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Sökning'),
    );

    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/css/select2.css" media="screen"/>
    <?php if (Yii::app()->user->hasFlash('index')): ?>
    <div class="alert alert-info  alert-dismissable">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        <strong><?php echo Yii::app()->user->getFlash('index'); ?></strong>
    </div>
<?php else: ?>
    <div class="horizontal-form">

        <form class="form" role="search" name="search" method="post">
           <div class="form-group">
            <label for="searchbox"><?php echo Yii::t("t","Valfria sökord");?></label>
            <input id="searchbox" type="text" name="searchbox" class="form-control" placeholder="<?php echo Yii::t("t","Fritextsökning...");?>" />
            <div class="form-group">
                <span class="glyphicon glyphicon-info-sign infoBox"></span>
            </div>
        </div>
        <div class="panel panel-info" id = "metaTagInfo">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3><?php echo Yii::t('t','Information om sökning');?></h3>
            </div>
            <div class="form group col-md-12">
                <table class="table table-condensed table-hover">
                    <tbody>
                <tr>
                    <th><?php echo Yii::t('t','Funktion');?></th>
                    <th><?php echo Yii::t('t','Metatag');?></th>
                    <th><?php echo Yii::t('t','Syntax på inmatning');?></th>
                    <th><?php echo Yii::t('t','Extra info');?></th>
                </tr>
                 <tr>                  
                    <td> <?php echo t("Sökning på ett ord som kan vara istället för tidigare sökningsord.");?> </td>
                    <td> OR</td>
                    <td> <?php echo t('Ord1 OR Ord2 OR Ord3 ...');?> </td>
                    <td> <?php echo t("I vanliga fall visas CV:n som har alla ord. Taggen gör att den visar alla som innehåller antigen det innan OR taggen eller ordet efter OR taggen.");?> </td>
                </tr>
                <tr>                  
                    <td> <?php echo t("Gör en sökning på en fras.");?> </td>
                    <td> ""</td>
                    <td> <?php echo t('"Fras"');?> </td>
                    <td> <?php echo t("Gör en sökning på en hel fras istället för på enskilda ord.");?> </td>
                </tr>
                <tr>                  
                    <td> <?php echo t("Gör en sökning på ett eller flera nyckelord.");?> </td>
                    <td> tag:</td>
                    <td> tag1,tag2,tag3,tag4...</td>
                    <td> <?php echo t('Separera taggar med "," tecken för att söka på flera nyckelord.');?> </td>
                </tr>
                <tr>                  
                    <td><?php echo t("Visa alla som söker en viss anställningsform.");?> </td>
                    <td> employment: </td>
                    <td> consult OR employment </td>
                    <td> <?php echo t("Det finns bara två typer av inmatning.");?></td>
                </tr>
                <tr>                  
                    <td><?php echo t("Visar alla CV:n som publicerats på ett specifikt datum.");?> </td>
                    <td> date: </td>
                    <td> YYYY-MM-DD </td>
                    <td> <?php echo t(" - ");?></td>
                </tr>
                <tr>                  
                    <td><?php echo t("Visa alla som söker jobb i en viss stad eller kommun.");?> </td>
                    <td> city: </td>
                    <td> <?php echo t("Namn på staden"); ?> </td>
                    <td> <?php echo t(" - ");?></td>
                </tr>
                <tr>                  
                    <td><?php echo t("Visa alla som söker jobb i en viss region.");?> </td>
                    <td> region: </td>
                    <td> <?php echo t("Namn på regionen"); ?> </td>
                    <td> <?php echo t(" - ");?></td>
                </tr>
                <tr>                  
                    <td><?php echo t("Visa alla som söker jobb i ett visst land.");?> </td>
                    <td> country: </td>
                    <td> <?php echo t("Namn på landet"); ?> </td>
                    <td> <?php echo t(" - ");?></td>
                </tr>
            </tbody>
                </table>
            </div>
        </div>
        <div class="form-group row col-md-6"  style="margin-left:-15px;margin-top:0px;margin-bottom: 15px;">
            <label for="searchTags"><?php echo Yii::t("t","Nyckelord");?></label>
            <input class="form-control" name="tags" id="searchTags" type="text"/>
        </div>
        <div class="form-group row clearfix"> </div> <!--Fix för Safari och IE-->
        <div class="checkbox">
          <input id="consultOption" name="consult" type="checkbox"/> <?php echo Yii::t("t","Sök efter konsultuppdrag");?><br>
          <input name="employment" type="checkbox"/> <?php echo Yii::t("t","Sök efter tillsvidareanställning");?>
      </div>
      <div>
        <?php $this->renderPartial('_allCountriesSelect', array('search'=>false)); ?>
    </div>

    <div style="margin-top:15px;">
        <button type="submit" class="btn btn-primary"><?php echo Yii::t("t","Sök");?></button>

    </div>
</form>
<!--Visa bara sorteringsknappar efter sökning -->
<?php
if(isset($_POST) && count($_POST)>1):?>
<hr/>
<h3 id="results"> <?php echo Yii::t('t', 'Sortera på:');?> </h3>
<div class="btn-group">
  <button id="title" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Rubrik');?></button>
  <button id="date" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Datum');?></button>
  <button id="typeOfEmployment" type="button" class="btn btn-success sortButton"><?php echo Yii::t('t', 'Anställningsform');?></button>
</div>
<?php endif;?>
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
<!-- Modal för att rapportera CV -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="reportModalLabel"><?php echo Yii::t("t","Rapportera CV");?></h4>
            </div>
            <div class="modal-body">
                <div id="reportModalInputDiv">
                    <h4> <?php echo Yii::t("t","Beskriv varför du vill rapportera detta CV");?></h4>
                    <textarea class="form-control" id="reasonTextField" rows="3"></textarea>
                </div>
                <h4 id="reportModalTextSuccess"><?php echo Yii::t("t","Vi har nu sparat din rapport. Tack för din tid!");?></h4>
                <h4 id="reportModalTextFailure"><?php echo Yii::t("t", "Ett oväntat fel inträffade, försök igen!");?></h4>
            </div>
            <div class="modal-footer" id="reportModalStartFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t("t", "Stäng, rapportera inte");?></button>
                <button type="button" class="btn btn-primary" id="submitReportBtn"><?php echo Yii::t("t", "Rapportera CV");?></button>
            </div>
            <div class="modal-footer" id="reportModalEndFooter">
                <button id="reportModalEndFooterCloseBtn" type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t("t", "Stäng");?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hotlistModal" tabindex="-1" role="dialog" aria-labelledby="hotlistTargetLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="hotlistTargetLabel"><?php echo t("Cv tillagt i Hotlist");?></h4>
            </div>
            <div id="hotlistTarget" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo t("OK");?></button>

            </div>
        </div>
    </div>
</div>
<script>
$(".infoBox").on("click", function(event){
    if($("#metaTagInfo").is(":visible"))
        $("#metaTagInfo").fadeOut("slow");
    else
        $("#metaTagInfo").fadeIn("slow");

});     
function scrollToResults(i,data){
    $('html, body').animate({
     scrollTop: $("#results").top
 }, 2000);
}
jQuery(document).ready(function ($) {
    $("#metaTagInfo").hide();
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
    
    //Återställder report modal
    jQuery("#reportModalEndFooterCloseBtn").on("click", function() {
        setTimeout(function() {
            $("#reportModalInputDiv").show();
            $("#reportModalStartFooter").show();
        }, 1000);
    });
    /*
    * Knappar för sortering av CVn
    */
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
            var displayText = '<?php echo Yii::t("t","anställningsform")?>';
            switch(post.sortBy){
                case "date":
                displayText ='<?php echo Yii::t("t","datum")?>';
                break;
                case "title":
                displayText = '<?php echo Yii::t("t","rubrik") ?>';
            }
            $("#sortSelection").html(displayText);
        });
    });
});
</script>





