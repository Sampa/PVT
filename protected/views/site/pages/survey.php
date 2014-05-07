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
					<div class="btn-group bootstro" data-bootstro-title="Välj fråga" data-bootstro-content="Här väljer du vilken sorts fråga som du vill ha i din enkät" data-bootstro-placement="top" data-bootstro-nextButtonText="Nästa»">
					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Textfält"><span class="glyphicon glyphicon-comment"></span> Text</a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Dropdown"><span class="glyphicon glyphicon-collapse-down"></span></a>
						<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Checkbox"><span class="glyphicon glyphicon-check"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Slider"><span class="glyphicon glyphicon-resize-horizontal"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Grid"><span class="glyphicon glyphicon-th"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Flerval"><span class="glyphicon glyphicon-list-alt"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Datum"><span class="glyphicon glyphicon-calendar"></span></a>
                        <a href="#" class="btn btn-success draggable survey-component" id="demo">Demo</a>
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
    <div class="col-md-10" >
        <div class="panel panel-info resize">
            <div class="panel-heading">
                <h3 class="panel-title">
                	<span class="glyphicon glyphicon-wrench"></span> Skräddarsy din layout
                </h3>
            </div>
            <div id="formLayoutDropzoneDiv" class="panel-body dropzone bootstro" data-bootstro-title="Bygg upp din enkät här"  data-bootstro-content="Dra hit de olika sorters frågor du vill ha med i din enkät" data-bootstro-placement="top" data-bootstro-prevButtonText="«Tillbaka">
                Panel content
            </div>
            <div style="z-index: 90; " class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se"></div>
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
            //har kvar dessa ifall vi kommer på att vi behöver dem senare
            start: function(event,ui){
            },
            stop: function(event,ui) {

            }
        });
        $( ".dropzone" ).droppable({
            drop: function( event, ui ) {
                if($(this).attr("id") =="formLayoutDropzoneDiv"){
                    var formFieldType = ui.draggable.attr("data-original-title");
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
            }
        });
    });
    $(function(){
         $("#demo").click(function(){
             bootstro.start(".bootstro", {
                 onComplete : function(params)
                 {
                     alert("Reached end of introduction with total " + (params.idx + 1)+ " slides");
                 },
                 onExit : function(params)
                 {
                     alert("Introduction stopped at slide #" + (params.idx + 1));
                 },
             });    
         });
 
    });
</script>
<style type="text/css">
    .draggable{
        z-index:92;
    }
    .dropzone{
        z-index: 91;
    }
    #formLayoutDropzoneDiv{
        min-height: 400px;
    }
     body {
        margin-top:55px;
    }
    .bootstro-highlight {
        background-color:transparent;
    }
</style>
