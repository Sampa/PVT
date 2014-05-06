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
					<div class="btn-group bootstro">
					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Textfält"><span class="glyphicon glyphicon-comment"></span> Text</a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Dropdown"><span class="glyphicon glyphicon-collapse-down"></span></a>
						<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Checkbox"><span class="glyphicon glyphicon-check"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Slider"><span class="glyphicon glyphicon-resize-horizontal"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Grid"><span class="glyphicon glyphicon-th"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Flerval"><span class="glyphicon glyphicon-list-alt"></span></a>
 					 	<a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="bottom" title="Datum"><span class="glyphicon glyphicon-calendar"></span></a>
                        <a href="#" class="btn btn-success draggable survey-component" 
                            data-bootstro-title="This is a large button"
                            data-bootstro-content="You already clicked here"
                            data-bootstro-placement="bottom" id="demo">Demo</a>
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
                Panel content
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.survey-component').tooltip();
        $(".draggable" ).draggable({
            revert: 'invalid',
            stop: function(event,ui) {
                //extrahera elementets id (som är satt till dess typ)
                var formFieldType = $( this).attr("id");
//                alert(formFieldType);
                switch(formFieldType){

                }
            }
        });
        $( ".dropzone" ).droppable({
//            greedy:true,
            drop: function( event, ui ) {
                $(this).addClass("success");
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
        z-index:2;
    }
    .dropzone{
        z-index: 1;
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
