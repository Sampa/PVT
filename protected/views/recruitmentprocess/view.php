<?php
/* @var $this RecruitmentprocessController */
/* @var $model Recruitmentprocess */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('t', 'Hem') => Yii::app()->getHomeUrl(),
    t('Rekryteringsprocesser')=>Yii::app()->baseUrl."/recruitmentprocess",
    $model->title,
);
?>

<div id="Congratz" style="display: none" class="alert alert-success">
    <strong><h3><?= t("Enkät skickad!")?></h3>
</div>
<div class="page-header">
    <h1><?php echo $model->title; ?></h1>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("company").":</B>";?></div>
    <div class="col-xs-6 col-sm-6"><?php echo $model->company; ?></div>
    <div class="col-xs-6 col-sm-4">
        <div class="form">
            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id'=>'recruitmentprocess-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>true,
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnType'=>true,
                    'validateOnSubmit' => true,
                    'errorCssClass' => 'has-error',
                    'successCssClass' => 'has-success',
                    'inputContainer' => '.form-control',
                    'validateOnChange' => true
                ),
            )); ?>

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
                                        <?php echo t("Processen avslutades av annan anledning")?>
                                    </label>
                                </div>
                                <div class="alert alert-danger" id="salaryErrorText">
                                    <p><strong> <?php echo Yii::t("t", "Lönen är inte numerisk. Vill du inte ange lön, sätt 0.");?></strong></p>
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
            <?php $this->endWidget(); ?>
        </div><!-- form end -->
    </div>
</div>
<?php if ($model->typeOfEmployment=='employment'){
    $typeOfEmployment=t('Anställning');
}else{
    $typeOfEmployment= t('Konsult');
}
?>
<?php if ($model->successfulProcess=='CandidateFoundOp'){
    $successfulProcess=  t('En kandidat hittades via Cvpages');
}elseif($model->successfulProcess=='OtherOpFound'){
    $successfulProcess=  t('En kandidat hittades på annat sätt');
}else{
    $successfulProcess=  t('Tjänsten tillsattes aldrig');
}
?>
<?php if($model->endDate == NULL) { ?>
    <div class="row">
        <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("typeOfService").":</B>";?></div>
        <div class="col-xs-6 col-sm-2"><?php echo $model->typeOfService;?> </div>
    </div>
<?php }else{ ?>
    <div class="row">
        <div class="controls" style="margin-top:20px">
            <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("typeOfService").":</B>";?></div>
            <div class="col-xs-6 col-sm-2"><?php echo $model->typeOfService;?> </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="controls" style="margin-top:20px">
        <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("typeOfEmployment").":</B>";?></div>
        <div class="col-xs-6 col-sm-2"><?php echo $typeOfEmployment;?> </div>
    </div>
</div>
<div class="row">
    <div class="controls" style="margin-top:20px">
        <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("startDate").":</B>";?></div>
        <div class="col-xs-6 col-sm-2"><?php echo substr($model->startDate,0,10);?> </div>
        <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("endDate").":</B>";?></div>
        <div class="col-xs-6 col-sm-2"><?php echo substr($model->endDate,0,10);?> </div>
    </div>
</div>
<?php if($model->endDate != NULL) { ?>
    <div class = "row">
        <div class="controls" style="margin-top:20px">
            <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("salaryOfHired").":</B>";?></div>
            <div class="col-xs-6 col-sm-2"><?php echo $model->salaryOfHired;?> </div>
            <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("successfulProcess").":</B>";?></div>
            <div class="col-xs-6 col-sm-2"><?php echo $successfulProcess;?> </div>
        </div>
    </div>
<?php } ?>

<?php
$geoid=$model->geographicAreaID;

?>
<div class="row">
    <div class="controls" style="margin-top:20px">
        <div class="col-xs-6 col-sm-2"><?php echo "<B>".$model->getAttributeLabel("geographicAreaID").":</B>";?></div>
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
<!-- KOMMENTAR AUTOSAVERUTA-->
<h3><?php echo Yii::t("t","Mina kommentarer");?></h3>
<!--i id=msg visas meddelandet när texten sparats-->
<div class="alert alert-info" style="display:none;" id="msg"></div>
<textarea id="textSave" class="form-control" rows="3">
    <?php echo $model->commentArea;?>
</textarea>


<div class="controls" style="margin-top:50px;margin-bottom:105px;">
    <div class="modal fade" id="mySurvey" tabindex="-1" role="dialog" aria-labelledby="mySurveyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="mySurveyLabel"><?php echo Yii::t("t","Skicka ut enkät till:");?></h4>
                </div>
                <div class="modal-body" >
                    <div id="noCv" style="color:red; display:none"> 
                        <strong>
                        </strong>
                     </div>
                    <div id="noSurvey" style="color:red; display:none">
                        <strong>
                            <?= t("Välj en enkät!");?>
                        </strong>
                    </div>
                   <?php echo t("Här är alla cvn du valt att skicka enkäten till:");?>
                    <ul id="modalText"></ul>
                </div>
                <div class="modal-footer">
                    <button style="" class="pull-left btn btn-primary btn dropdown-toggle" type="button" data-toggle="dropdown">
                        <span id="surveyNameButton" title=""><?php echo Yii::t("t","Välj enkät");?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <?php echo Recruiter::getSurveysAsList();?>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl("survey/create");?>">
                                <?php echo Yii::t("t","Skapa ny enkät");?>
                            </a>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <?php echo Yii::t("t", "Ångra!");?>
                    </button>
                    <button id="sendSurveyButton" type="button" class="btn btn-success">
                        <?php echo Yii::t("t", "Skicka");?>
                    </button>

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
            <button type="button" class="btn btn-info btn pull-right" id="printOutCheckedCv" data-toggle="modal" data-target="#mySurvey" style="margin-right: 10px">
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
    /*Det här sköterautoSave*/
    $(function() {
        $("#textSave").autoSave(function() {
            var comment = document.getElementById('textSave').value;
            var recId = <?php echo $model->id?>;
            $("#msg").fadeIn().text("Dina kommentarer sparas i realtid ");

            $.ajax({
                type:"POST",
                url: "<?php echo Yii::app()->baseUrl; ?>" + "/recruitmentprocess/commentUpdate",
                data:{"recId":recId, "comment":comment}
            });
        }, 500);
    });

    $("#sendSurveyButton").on("click",function(){
        var listOfIds = {};
        $("#modalText").children("li").each(function(index){
         listOfIds[index] = $(this).attr("id");
     });
        $.ajax({
            type:"POST",
            url: "<?php echo Yii::app()->baseUrl; ?>" + "/survey/sendOutSurveys",
            dataType:"json",
            data:{
                "ids":listOfIds,
                "surveyId":$("#surveyNameButton").attr("title")
            }
        }).done(function(data){
            if(data.status=="success"){
                $('#mySurvey').modal('hide');
                $('#Congratz').show().delay(2001).fadeOut("slow");
            }else if(data.status=="fail"){
                $('#noCv').html(data.message).show().delay(2001).fadeOut("slow");
            }
        });

    });

    $("#openModalBtn").on("click", function(){
        $("#myQuitTextSuccess").hide();
        $("#salaryErrorText").hide();
        $("#closeButton").hide();
        $("#salary").keyup(function () {
            var salary = document.getElementById("salary").value;
            if(!$.isNumeric(salary)) {
                $("#salaryErrorText").fadeIn("slow");
            } else {
                $("#salaryErrorText").fadeOut("slow");
            }
        });
        $(".closeProcessBtn").on("click", function(){
            var salary = document.getElementById("salary").value;
            var closeRecId = $(this).attr("id");
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
                url: "<?php echo Yii::app()->baseUrl; ?>" + "/recruitmentprocess/update",
                data: {"id":closeRecId, "salaryId": salary, "radioId": radioValue}
            }).done(function( data ) {
                $("#myQuitInputDiv").hide();
                $("#beforeSuccessButtonGroup").hide();
                $("#myQuitTextSuccess").fadeIn("slow");
                $("#closeButton").fadeIn("slow");
            })
            $("#closeButton").on("click", function(){
                window.document.location = "<?php echo Yii::app()->baseUrl; ?>" + "/recruitmentprocess/view/" + closeRecId;
            });
        });
    });
    $("input[name='switchbutton']").on('change',function(){
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
        $('input[name="switchbutton"]').each(function(){
            var cvId = $(this).attr('id');
            var isO = $(this).prop('checked');
            var processId = <?php echo $model->id?>;
            if(isO){
                $(this).prop('checked', true);
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '/hotlist/delete/'+cvId
                }).done(function(data){
                    window.document.location = "<?php echo Yii::app()->baseUrl; ?>" + "/recruitmentprocess/view/" + processId;
                });
            }
        });

    });
    $('#printOutCheckedCv').on('click', function(event){
        $('#modalText').html("");
        $('input[name="switchbutton"]').each(function(){
            var cvId = $(this).attr('id');
            var isO = $(this).prop('checked');
            var processId = <?php echo $model->id?>;
            if(isO){
                $('#modalText').append("<li id='"+cvId+"'>" +  $(this).attr('data-title')+ "</li>");
            }
        });
    });
</script>
