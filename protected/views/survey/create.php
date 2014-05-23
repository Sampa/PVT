<?php
/* @var $this SurveyController */
/* @var $model Survey */
    $this->pageTitle = Yii::app()->name . t(' - Skapa enkät');
    $this->breadcrumbs = array(
        Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
        t('Enkäter')=>array('admin'),
        Yii::t("t",'Ny Enkät'),
    );
    $recruiter=Recruiter::model()->findByPk(Yii::app()->user->id);
    $beenToSurveyPage=$recruiter->beenToSurveyPage;
?>

<div class="container page-min-height bootstro" data-bootstro-title="<?php echo Yii::t("t","Skapa din personliga enkät");?>" data-bootstro-content="<?php echo Yii::t("t","Du använder dig av dessa fält för att bygga upp din enkät så som du vill");?>" data-bootstro-placement="left" data-bootstro-width='150px' data-bootstro-step="0">
    <div class="row col-md-12 dropzone">
        <div style="padding: 0px;position: fixed;max-width: 180px;" class="col-md-2 panel panel-info bootstro" data-bootstro-title="<?php echo Yii::t("t","Välj fråga");?>" data-bootstro-content="<?php echo Yii::t("t","Här väljer du vilken sorts fråga som du vill ha i din enkät");?>" data-bootstro-placement="right" data-bootstro-step="1">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-cog"></span><?php echo Yii::t("t","Komponenter");?>
                </h3>
            </div>
            <div class="panel-body wrapper-component">
                <div>
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="text" title="Textfält"><span class="glyphicon glyphicon-comment"></span><?php echo t('Textfält'); ?></a>
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="textarea" title="Textarea"><span class="glyphicon glyphicon-comment"></span><?php echo t(' Textarea'); ?></a>
                    <!--                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="dropdown" title="Dropdown"><span class="glyphicon glyphicon-collapse-down"></span> Dropdown</a>-->
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="checkbox" title="Checkbox"><span class="glyphicon glyphicon-check"></span><?php echo t(' Flerval'); ?></a>
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="radio" title="Radio"><span class="glyphicon glyphicon-list-alt"></span><?php echo t(' Enkelval'); ?></a>


	                <!-- spara och hjälp-->
                    <button class="btn btn-warning survey-component" id="help">
                        <span class="glyphicon glyphicon-question-sign"></span> <?php echo Yii::t("t","Hjälp");?>
                    </button>
                    <button id="saveSurvey" class="btn btn-info survey-component">
                        <span class="glyphicon glyphicon-floppy-disk"></span> <?php echo Yii::t("t","Spara");?>
                    </button>
                </div>
            </div>
        </div>

        <!--        <div class="col-md-2 pull-right dropzone">-->
        <!--            <div style="position: fixed;max-width: 1800px;min-height: 900px;" class="panel panel-warning bootstro" data-bootstro-title="Släng saker du inte vill ha" data-bootstro-content="Detta är din papperskorg, släng saker du inte vill ha här." data-bootstro-placement="bottom" data-bootstro-width='272px' data-bootstro-step="3">-->
        <!--                <div class="panel-heading">-->
        <!--                    <h3 class="panel-title">-->
        <!--                        <span class="glyphicon glyphicon-trash"></span>--><?php //echo Yii::t("t","Papperskorg");?>
        <!--                    </h3>-->
        <!--                </div>-->
        <!--                <div id="garbage" name="target" class="panel-body dropzone"></div>-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="col-md-10 pull-right" >
            <div class="panel panel-info survey-layout bootstro" data-bootstro-title="<?php echo Yii::t("t","Bygg upp din enkät här");?>" data-bootstro-content="<?php echo Yii::t("t","Dra hit de olika sorters frågor du vill ha med i din enkät");?>" data-bootstro-placement="left" data-bootstro-step="2">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-wrench "></span>
	                    <span id="survey-title"><?php echo Yii::t("t","Din layout");?></span>
                    </h3>
                </div>
                <div class="panel-body dropzone" id="formLayoutDropzoneWrapper">
                    <ul id="formLayoutDropzoneUl">

                    </ul>
                </div>
                <div style="z-index: 90;" class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se"></div>
            </div>
        </div>
    </div>
</div>
<?php $this->renderPartial("formFieldTemplates");?>
<script>
	//NÄR MAN KLICKAR PÅ SPARA KNAPPEN
	$("#saveSurvey").on("click",function(){
		var type,title;
		/*be användaren om en titel*/
		bootbox.prompt("<?php echo Yii::t("t","Namnge din enkät (kommer bara synas för dig");?>", function(text) {
			//skit i resten om användaren inte anger en titel
			if (text=== null)
				return;
			title = text;
			/*initiera ett jsonObject för hela enkäten med grundinfo */
			var formInfo = {
				title:title,
				questions:{}
			}
			/* loopa igenom varje li element i vår dropzone eftersom de innehåller nödvändig info*/
			$("#formLayoutDropzoneUl").children("li").each(function(index){
				type = $(this).attr("name"); //possible:checkbox,radio,text,textarea
				/*initiera ett jsonObject för ETT fält */
				var fieldInfo = {
					type:type,
					question:$(this).find(".questionResultTarget").html()
				}
				/*sätt bara options ifall vi ska ha några, kollas sen på servern */
				if(type=="checkbox" || type=="radio" ){
					fieldInfo.options = {}
					//hämtar ut själva svarsalternativets text från alla allternatiz denna fråga har
					$(this).find("div[name="+$(this).attr("id")+"]").children("label").each(function(index,element){
						fieldInfo.options[index] = $(this).children(".optionText").html();
					});
				}
				//lägg till det här fältet i enkät objektet
				formInfo.questions[index] = fieldInfo;
			});//slut for each loop
			//skicka enkätobjektet till SurveyController actionCreate.php
			$.ajax({
				type:"post",
				url:"/survey/create",
				data:formInfo,
				dataType:"json",
				success:function(data){
					if(data.success){
						$("#survey-title").html(t("Sparat som ")+title);
						$(".survey-layout").addClass("green")
					}
				}
			});//end ajax
		});//end bootbox prompt
	});

    //flyttade massor till main.js cvpages/js för läsbarheten
    $(function(){
        initialize();
        var firstTimer = '<?php echo $beenToSurveyPage ?>';
        if(firstTimer == 0) {
            startBootstro();
            <?php
                 $recruiter->beenToSurveyPage=1;
                 $recruiter->save(false);
            ?>
        }
        $("#help").on('click',function(){
            // Survey-components kan inte ha classen draggable när vi kör bootstro, highlight slutar fungera då.
            // Vi tar därför bort classen innan vi kör.
            // När vi är klara lägger vi tillbaka classen för att få rätt z-index som hör till classen.
            startBootstro();
        });
    });

    function initialize() {
//fungerar men det fattas något visuellt för att visa att det faktiskt går att göra om storleken

        $('.survey-component').tooltip();
        $(".draggable" ).draggable({
            revert: true
        });
        function appendNewFormElements(question,formFieldType){
//clona rätt template element
            var questionTemplate = $("#questionTemplate").clone();
            questionTemplate.children(".questionResultTarget").html(question);
            var clone = $("[name="+formFieldType+"Template]").clone();
//hämta antalet likadana element i dropzone för att kunna ge unikt namn
            var currentNumberOfTextFields = $("#formLayoutDropzoneUl ."+formFieldType+"Template");
//byt ut name attributet till något unikt med hjälp av antalet ovan
            clone.attr("name",formFieldType+currentNumberOfTextFields.length);
//kasta in nya elementet sist i diven
            var li = $("#sortableLiTemplate").clone();
            li.attr("id",clone.attr("name"));
	        li.attr("name",formFieldType);
            li.find(".panel-body").html(clone);
            li.find(".panel-heading").prepend(questionTemplate);
            $("#formLayoutDropzoneUl").append(li);
            li.addClass("insideDroppable");
        }
        $( ".dropzone" ).droppable({
            drop: function( event, ui ) {
                if(!$('.panel-body').hasClass('dropzone')){ //freeze under guiden
                    return;
                }
                if($(this).attr("id") =="formLayoutDropzoneWrapper"){
                    if(ui.draggable.hasClass('insideDroppable')){ //stoppa om man sorterar om komponenter
                        return;
                    }
                    bootbox.prompt("<?php echo Yii::t("t","Formulera din fråga här:");?>", function(question) {
                        //skit i resten om användaren inte anger en fråga
                        //vad man valde för typ
                        if (question  === null)
                            return;
                        var formFieldType = ui.draggable.attr("id");//defaultVärde
                        var numOfOptions = 0;
                        var pause = true;
                        switch (formFieldType){
                            case "dropdown":
                                break;
                        }
                        appendNewFormElements(question,formFieldType);
                    });
                }
            }
        });
        $("#formLayoutDropzoneUl").sortable({
            connectToSortable: '#formLayoutDropzoneUl'
        });
    }
</script>