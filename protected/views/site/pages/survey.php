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
            <div class="panel-body dropzone">
                Panel content
            </div>
        </div>
    </div>
    <!--    <div class="list-group">-->
<!--        <a href="#" class="list-group-item active">-->
<!--            <h4 class="list-group-item-heading">List group item heading</h4>-->
<!--            <p class="list-group-item-text"></p>-->
<!--        </a>-->
<!--    </div>-->

</div>

<script>
	$(document).ready(function(){
			$('.survey-component').tooltip();
	});
    $(function() {
        $(".draggable" ).draggable({
            stop: function(event,ui) {
                //extrahera elementets id (som är satt till dess typ)
                var formFieldType = $( this).attr("id");
                switch(formFieldType){

                }
            }
        });
        $( ".dropzone" ).droppable({
            drop: function( event, ui ) {
                $(this).addClass("success");
            }
        });
    });
</script>
