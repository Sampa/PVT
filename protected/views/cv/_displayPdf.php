<?php
/*
 * @model = ett cv object
 *
 */
?>
<div id="pdf<?php echo $model->id;?>" class="embeddedPdf col-md-8 col-lg-8 col-sm-4">

</div>
<span class="clearfix"></span>

<style>
    .embeddedPdf {
        margin: 2em auto;
        height: 500px;
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