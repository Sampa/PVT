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
                   		<span class="glyphicon glyphicon-wrench"></span> Välj delar till enkäten
					</h3>
                </div>
                <div class="panel-body">
					<div class="btn-group">
					 	<button type="button" class="btn btn-success draggable"><span class="glyphicon glyphicon-comment"></span></button>
					 	<button type="button" class="btn btn-success draggable"><span class="glyphicon glyphicon-collapse-down"></span></button>
					 	<button type="button" class="btn btn-success draggable">Radiobuttons</button>
					 	<button type="button" class="btn btn-success draggable"><span class="glyphicon glyphicon-check"></span></button>
					 	<button type="button" class="btn btn-success draggable"><span class="glyphicon glyphicon-resize-horizontal"></span></button>
					 	<button type="button" class="btn btn-success draggable"><span class="glyphicon glyphicon-th"></span></button>
					 	<button type="button" class="btn btn-success draggable"><span class="glyphicon glyphicon-list-alt"></span></button>
					 	<button type="button" class="btn btn-success draggable"><span class="glyphicon glyphicon-calendar"></span></button>
					 	<button type="button" class="btn btn-success draggable">File</button>
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
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body" id="dropzone">
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



