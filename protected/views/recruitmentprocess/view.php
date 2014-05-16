<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
     t('Rekryteringsprocesser')=>array('index'),
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
  <h1><?php echo $model->title; ?></h1>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-2"><?php echo Yii::t("t", "<strong>Företag/Organisation: </strong>");?></div>
    <div class="col-xs-6 col-sm-6"><?php echo $model->company; ?></div>
    <div class="col-xs-6 col-sm-4">
      <?php if($model->endDate == NULL) { ?>
      <button id="openModalBtn" class="btn btn-success btn-block" data-toggle="modal" data-target="#myQuit">
         <?php echo Yii::t("t","Avsluta rekryteringsprocessen");?>
      </button>
      <?php } ?>
      <div class="modal fade" id="myQuit" tabindex="-1" role="dialog" aria-labelledby="myQuitLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myQuitLabel"><?php echo Yii::t("t","Avsluta rekryteringsprocessen");?></h4>
            </div>
            <div class="modal-body">
             <div id="myQuitInputDiv">
              <body><?php echo Yii::t("t","Här fyller du i uppgifter om den avslutade processen");?>
                <br><br>
        	      <div class="radio">
                    <label>
                    <input type="radio" name="optionsRadios" id="CandidateFoundOp" value="CandidateFoundOp" checked>
                            <?php echo t("Jag hittade en kandidat här på Cvpages")?>
                    </label>
                </div>
              <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="OtherOpFound" value="OtherOpFound">
                          <?php echo t("Jag hittade en kandidat genom andra medel")?>
                </label>
              </div>
              <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="NoCandidateFoundOp" value="NoCandidateFoundOp">
                          <?php echo t("Processen avslutatdes av annan anledning")?>
                </label>
              </div>
                <strong> <?php echo Yii::t("t", "Här kan du fylla i lönen (avrunda till jämnt tusental)");?></strong>
            	  <input type="text" class="form-control" id="salary" placeholder=<?php echo Yii::t("t", "Lön");?>>
              </body>
            </div>
            <h4 id="myQuitTextSuccess"><?php echo Yii::t("t","Vi har nu avslutat processen.");?></h4>
            </div>
            <div class="modal-footer">
              <div id="beforeSuccessButtonGroup">
                <button type="button" id="regretButton" class="btn btn-warning" data-dismiss="modal"><?php echo Yii::t("t", "Ångra, avsluta inte processen!");?></button>
                <button type="button" id="<?php echo $model->id?>" class="btn btn-success closeProcessBtn"><?php echo Yii::t("t", "Avsluta rekryteringsprocessen");?></button>
              </div>
             <button type="button" id="closeButton" class="btn btn-info" data-dismiss="modal"><?php echo t("Stäng");?></button>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php if ($model->typeOfEmployment=='employment'){
	$typeOfEmployment='Anställning';
}else{ 
	$typeOfEmployment='Konsult';
}
?>

<div class="row">
  <div class="col-xs-6 col-sm-2"><?php echo Yii::t("t", "<strong>Typ av tjänst: </strong>");?></div>
  <div class="col-xs-6 col-sm-2"><?php echo $model->typeOfService;?> </div>
</div>
<div class="row">
	<div class="controls" style="margin-top:20px">
    <div class="col-xs-6 col-sm-2"><?php echo Yii::t("t", "<strong>Anställningsform: </strong>");?></div>
    <div class="col-xs-6 col-sm-2"><?php echo $typeOfEmployment;?> </div>
  </div>
</div>
<div class="row">
	<div class="controls" style="margin-top:20px">
   <div class="col-xs-6 col-sm-2"><?php echo Yii::t("t", "<strong>Startdatum: </strong>");?></div>
   <div class="col-xs-6 col-sm-2"><?php echo substr($model->startDate,0,10);?> </div>
   <div class="col-xs-6 col-sm-2"><?php echo Yii::t("t", "<strong>Slutdatum:</strong>");?></div>
   <div class="col-xs-6 col-sm-2"><?php echo substr($model->endDate,0,10);?> </div>
  </div>
</div>
<?php 
$geoid=$model->geographicAreaID;

?>
<div class="row">
  <div class="controls" style="margin-top:20px">
    <div class="col-xs-6 col-sm-2"><?php echo Yii::t("t", "<strong>Geografisk plats: </strong>");?></div>
      <?php
        if(isset($model->geographicArea->country)){
            $countryName = $model->geographicArea->country;

        }else{
            $countryName=null;
        }
      ?>
    <div class="col-xs-6 col-sm-2"><?php echo $countryName;?> </div>
  </div>
</div>

<div class="page-header">
</div>

<h3><?php echo Yii::t("t","Mina kommentarer");?></h3>
<textarea class="form-control" rows="3"></textarea>


<div class="controls" style="margin-top:50px;margin-bottom:105px;">
  <div class="modal fade" id="mySurvey" tabindex="-1" role="dialog" aria-labelledby="mySurveyLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="mySurveyLabel"><?php echo Yii::t("t","Skicka ut enkät till:");?></h4>
        </div>
        <div class="modal-body">
           Här listas alla cvn man har valt att skicka till
        </div>
        <div class="modal-footer">
       	  <button class="btn btn-primary btn dropdown-toggle" type="button"data-toggle="dropdown">
                    <?php echo Yii::t("t","Välj enkät");?> <span class="caret"></span>
          </button>
              <ul class="dropdown-menu">
                <?php echo Recruiter::getSurveysAsList();?>
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
  <h1><?php echo Yii::t("t","Hotlist");?>  
    <div class="pull-right col-md-1">
      <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array('name' => 'switchAll'));?>
    </div>
    <div class="btn-group pull-right">
    <button type="button" id='remove' class="btn btn-warning btn pull-right" data-toggle="modal">
      <span class="glyphicon glyphicon-trash"></span><?php echo Yii::t("t","Ta bort");?>
    </button>
    <button type="button" class="btn btn-info btn pull-right" data-toggle="modal" data-target="#mySurvey" style="margin-right: 10px">
      <span class="glyphicon glyphicon-file"></span><?php echo Yii::t("t","Skicka ut enkät");?>
    </button>
  </div>

  </h1>
</div>
<div class="page-header">
  <?php 
  $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_hotlistview',
  ));?>
</div>
<script>
  $("#openModalBtn").on("click", function(){
      $("#myQuitTextSuccess").hide();
      $("#closeButton").hide();
      $(".closeProcessBtn").on("click", function(){
        var closeRecId = $(this).attr("id");
        var salary = document.getElementById("salary").value;
        var radioValue = "";
        var optionsradios = document.getElementsByName("optionsRadios");
            for (var i = 0, length = optionsradios.length; i<length; i++){
              if(optionsradios[i].checked){
                  radioValue = optionsradios[i].value;
                  break;
              }
            }
        
        $.ajax({
          type:"POST",
          url:"/recruitmentprocess/update",
          data: {"id":closeRecId, "salaryId": salary, "radioId": radioValue}
        }).done(function( data ) {
            $("#myQuitInputDiv").hide();
            $("#beforeSuccessButtonGroup").hide();
            $("#myQuitTextSuccess").fadeIn("slow");
            $("#closeButton").fadeIn("slow");
        })
        $("#closeButton").on("click", function(){
          window.document.location ='/recruitmentprocess/view/'+closeRecId;
        });
    });
  });
 </script>
 <script>
  $("input[name='switchbutton']").on('change',function(){
    alert($(this).attr("id"))
  });

  $("input[name='switchAll']").on('change',function(){
    var isOn = $(this).prop('checked');
    $("input[name='switchbutton']").each(function(){
      if(isOn){
        $(this).prop('checked', true);
     }
     else{
      $(this).prop('checked', false);
     }
    });

  });

  $('#remove').on('click', function(event){
    var isO = $(this).prop('checked');
    $('input[name="switchbutton"]').each(function(){
        if(isO){
          $(this).prop('checked', true);
          alert('Hej');
        }
    });
  });

</script>
