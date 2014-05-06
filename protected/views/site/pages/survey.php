<?php
$this->pageTitle = Yii::app()->name . ' - Skapa enkät';
$this->breadcrumbs = array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t",'Survey'),
);
?>
<div class="container page-min-height">
    <div class="row col-md-10">
        <div class="col-md-7">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                   		<span class="glyphicon glyphicon-cog"></span> Välj delar till enkäten
					</h3>
                </div>
                <div class="panel-body">
                	<p>Dra komponenter från nedan till din layout.</p>
					<div class="btn-group">
					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Textfält"><span class="glyphicon glyphicon-comment"></span> Text</a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Dropdown"><span class="glyphicon glyphicon-collapse-down"></span></a>
						<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Checkbox"><span class="glyphicon glyphicon-check"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Slider"><span class="glyphicon glyphicon-resize-horizontal"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Grid"><span class="glyphicon glyphicon-th"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Flerval"><span class="glyphicon glyphicon-list-alt"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Datum"><span class="glyphicon glyphicon-calendar"></span></a>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                   		<span class="glyphicon glyphicon-trash"></span> Papperskorg
					</h3>
                </div>
                <div class="panel-body dropzone">
                    Panel content
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">

        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                	<span class="glyphicon glyphicon-wrench"></span> Skräddarsy din layout
                </h3>
            </div>
            <div id="formLayoutDropzoneDiv" class="panel-body dropzone">
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        //fungerar men det fattas något visuellt för att visa att det faktiskt går att göra om storleken
        $(".resize").resizable();
        $('.survey-component').tooltip();
        $(".draggable" ).draggable({
            revert: true,
            start: function(event,ui){
            },
            stop: function(event,ui) {
                var copy  = $(this).clone();
                //extrahera elementets id (som är satt till dess typ)
                var formFieldType = $(this).attr("data-original-title");
                $("#formLayoutDropzoneDiv").append("du skapade ett "+formFieldType);

                switch(formFieldType){
                    case "Textfält":
//                        alert("du skapade ett textfält");
                        break;
                    case "Dropdown":
//                        alert("du skapade ett textfält");
                        break;
                }
            }
        });
        $( ".dropzone" ).droppable({
            drop: function( event, ui ) {
                //$(this) är elementet vi droppat något i, antingen trash eller formfieldvyn
            }
        });
    });
</script>
<style type="text/css">
    .draggable{
        z-index:2;
    }
    .dropzone{
        z-index: 1;
    }
    #formLayoutDropzoneDiv{
        min-height: 400px;
    }
</style>
