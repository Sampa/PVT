<?php
/*
 * $model = ett cv object
 *
 */
?>
<?php $this->renderPartial("_view",array("data"=>$model));?>

<div id="statement" style="display:none;">
    <p><?=t("Din klient saknar pdf plugin, ");?>
        <a href="http://pvt.dsv.su.se/Group1<?=$model->pathToPdf;?>">
            <?=t("klicka här för att ladda ner pdf:en istället");?>
        </a>
    </p>
</div>
<!-- diven som pdf:en kommer laddas in/visas i)-->
<div id="pdf<?php echo $model->id;?>" class="embeddedPdf col-md-12 col-lg-12 col-sm-6"></div>
<span class="clearfix"></span>

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
                <h4 style="display:none;" id="reportModalTextSuccess"><?php echo Yii::t("t","Vi har nu sparat din rapport. Tack för din tid!");?></h4>
                <h4 style="display:none;" id="reportModalTextFailure"><?php echo Yii::t("t", "Ett oväntat fel inträffade, försök igen!");?></h4>
            </div>
            <div class="modal-footer" id="reportModalStartFooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t("t", "Stäng, rapportera inte");?></button>
                <button type="button" class="btn btn-primary" data-id="" 
                data-url="<?php echo yii::app()->baseUrl;?>/reportedCv/create" id="submitReportBtn"><?php echo Yii::t("t", "Rapportera CV");?></button>
            </div>
            <div class="modal-footer" id="reportModalEndFooter">
                <button id="reportModalEndFooterCloseBtn" type="button" class="btn btn-default" data-dismiss="modal">
                    <?php echo Yii::t("t", "Stäng");?></button>
            </div>
        </div>
    </div>
</div>

<!-- CSS kod vi ska flytta till main.css när alla är nöjda med utseendet-->
<style>

    .embeddedPdf {
        margin: 2em auto;
        height: 1000px;
        /*tycker height 1000 var rätt så bra storlek, den som vill får ändra */
    }

    .embeddedPdf p {
        padding: 1em;
    }
    .embeddedPdf object {
        display: block;
        border: solid 1px #666;
    }
</style>
<script>
    window.onload = function (){
        var msg;
        var s = document.getElementById("statement");
        var id = <?=$model->id;?>;
        var params = {
            url: "http://pvt.dsv.su.se/Group1<?=$model->pathToPdf;?>",
            pdfOpenParams: {
                navpanes: 0,
                toolbar: 0,
                statusbar: 0,
                view: "FitV"
            }
        };
        var myPDF = new PDFObject(params).embed("pdf<?=$model->id;?>");
        if(!myPDF){ //kunde inte embedda
            $("#statement").show();
            $(".embeddedPdf").hide();
        }
    };
</script>