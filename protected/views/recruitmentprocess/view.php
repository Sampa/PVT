<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
     'Rekryteringsprocesser'=>array('index'),
    $model->title,

);


$this->menu=array(
	array('label'=>'List Recruitmentprocess', 'url'=>array('index')),
	array('label'=>'Create Recruitmentprocess', 'url'=>array('create')),
	array('label'=>'Update Recruitmentprocess', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Recruitmentprocess', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recruitmentprocess', 'url'=>array('admin')),
);
?>
 <div class="page-header">
<h1><?php echo Yii::t('t', 'Visar '),$model->title; ?></h1>
</div>

<div class="row">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Företag/Organisation: </strong>"), "<span style='margin-left:38px'> $model->company</span>"?></div>
  <div class="col-xs-6 col-sm-4"></div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-6 col-sm-4"><!-- Button trigger modal -->
<button class="btn btn-success btn-block" data-toggle="modal" data-target="#myQuit">
  <?php echo Yii::t("t","Avsluta rekryteringsprocessen");?>
</button>

<!-- Modal -->
<div class="modal fade" id="myQuit" tabindex="-1" role="dialog" aria-labelledby="myQuitLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myQuitLabel"><?php echo Yii::t("t","Avsluta rekryteringsprocessen");?></h4>
      </div>
      <div class="modal-body">
        <body><?php echo Yii::t("t","Här fyller du i uppgifter om den avslutade processen");?>
        	<br><br>
        	<strong> <?php echo Yii::t("t", "Här kan du fylla i lönen (avrunda till jämnt tusental)");?></strong>
        	<input type="text" class="form-control" id="salary" placeholder=<?php echo Yii::t("t", "Lön");?>>

        </body>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo Yii::t("t", "Ångra, avsluta inte processen!");?></button>
        <button type="button" class="btn btn-success"><?php echo Yii::t("t", "Spara och avsluta rekryteringsprocessen");?></button>
      </div>
    </div>
  </div>
</div></div>
</div>
<?php if ($model->typeOfEmployment=='employment'){
	$typeOfEmployment='Anställning';
}else{ 
	$typeOfEmployment='Konsult';
}
?>

<div class="row">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Typ av tjänst: </strong>"),"<span style='margin-left:101px'> $model->typeOfService</span>"?></div>

</div>
<div class="row">
	<div class="controls" style="margin-top:20px">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Anställningsform: </strong>"),"<span style='margin-left:70px'> $typeOfEmployment</span>"?></div>
</div>
</div>
<div class="row">
	<div class="controls" style="margin-top:20px">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Startdatum: </strong>"),"<span style='margin-left:110px'> $model->startDate</span>"?></div>
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Slutdatum:</strong>"),"<span style='margin-left:55px'>$model->endDate</span>"?></div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs"></div>
  <div class="col-xs-6 col-sm-4"></div>
</div>
</div>

<div class="row">
<div class="controls" style="margin-top:20px">
  <div class="col-xs-6 col-sm-4"><?php echo Yii::t("t", "<strong>Geografisk plats: </strong>"),"<span style='margin-left:79px'> $model->geographicAreaID</span>"?></div>
</div>
</div>
<h3><?php echo Yii::t("t","Mina kommentarer");?></h3>
<textarea class="form-control" rows="3"></textarea>

<div class="controls" style="margin-top:50px;margin-bottom:105px;">
<button type="button" class="btn btn-info btn pull-right" data-toggle="modal" data-target="#mySurvey">
<span class="glyphicon glyphicon-file"></span><?php echo Yii::t("t","Skicka ut enkät");?>
</button>
<div class="modal fade" id="mySurvey" tabindex="-1" role="dialog" aria-labelledby="mySurveyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="mySurveyLabel"><?php echo Yii::t("t","Skicka ut enkät till:");?></h4>
      </div>
      <div class="modal-body">
     Här listat alla cvn man har valt att skicka till
      </div>
      <div class="modal-footer">
      	 <button class="btn btn-primary btn dropdown-toggle" type="button"data-toggle="dropdown">
                    <?php echo Yii::t("t","Välj enkät");?> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <?php echo Recruiter::getProcessesAsList();?>
                    <li class="divider"></li>
                    <li><a href="<?php echo Yii::app()->createUrl("sökväg till enkät HÄR");?>"><?php echo Yii::t("t","Skapa ny enkät");?></a></li>
                </ul>
		<button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo Yii::t("t", "Ångra, skicka inte enkäten!");?></button>
        <button type="button" class="btn btn-success"><?php echo Yii::t("t", "Spara och skicka enkät");?></button>

      </div>
    </div>
  </div>
</div>

</div>
 <div class="page-header">
<h1><?php echo Yii::t("t","Hotlist");?></h1>
</div>
<?php echo $hotlist;?>

<!-- 
<?php $this->widget('zii.widgets.CDetailView',array(
   'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'title',
		'recruiterId',
		'endDate',
		'typeOfService',
		'typeOfEmployment',
		'company',
	),
)); ?> -->