<?php
/*
 * $model = ett cv object
 *
 */
?>
<?php $this->renderPartial("_view",array("data"=>$model));?>

<!-- diven som pdf:en kommer laddas in/visas i)-->
<div id="pdf<?php echo $model->id;?>" class="embeddedPdf col-md-12 col-lg-12 col-sm-6"></div>
<span class="clearfix"></span>


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
        var id = <?=$model->id;?>;
        id = new PDFObject({
            url: "http://pvt.dsv.su.se/Group1<?=$model->pathToPdf;?>" }).embed("pdf<?=$model->id;?>");
    };
</script>