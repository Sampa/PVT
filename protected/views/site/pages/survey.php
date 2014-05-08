<?php
    $this->pageTitle = Yii::app()->name . ' - Skapa enkät';
    $this->breadcrumbs = array(
        Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
        Yii::t("t",'Survey'),
    );
    $recruiter=Recruiter::model()->findByPk(Yii::app()->user->id);
    $beenToSurveyPage=$recruiter->beenToSurveyPage;
?>

<div class="container page-min-height bootstro" data-bootstro-title="Skapa din personliga enkät" data-bootstro-content="Du använder dig av dessa fält för att bygga upp din enkät så som du vill" data-bootstro-placement="left" data-bootstro-width='150px' data-bootstro-step="0">
    <div class="row col-md-12">
        <div style="padding: 0px;position: fixed;max-width: 180px;" class="col-md-2 panel panel-info bootstro" data-bootstro-title="Välj fråga" data-bootstro-content="Här väljer du vilken sorts fråga som du vill ha i din enkät" data-bootstro-placement="right" data-bootstro-step="1">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-cog"></span> Komponenter
                </h3>
            </div>
            <div class="panel-body wrapper-component">
                <div>
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="text" title="Textfält"><span class="glyphicon glyphicon-comment"></span> Textfält</a>
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="textarea" title="Textarea"><span class="glyphicon glyphicon-comment"></span> Textarea</a>
<!--                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="dropdown" title="Dropdown"><span class="glyphicon glyphicon-collapse-down"></span> Dropdown</a>-->
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="checkbox" title="Checkbox"><span class="glyphicon glyphicon-check"></span> Flerval</a>
                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="radio" title="Radio"><span class="glyphicon glyphicon-list-alt"></span> Enkelval</a>
<!--                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="slider" title="Slider"><span class="glyphicon glyphicon-resize-horizontal"></span> Slider</a>-->
<!--                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" id="grid" title="Grid"><span class="glyphicon glyphicon-th"></span> Grid</a>-->
<!--                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" title="Flerval"><span class="glyphicon glyphicon-list-alt"></span> Flerval</a>-->
<!--                    <a href="#" class="btn btn-success draggable survey-component" data-toggle="tooltip" data-placement="left" title="Datum"><span class="glyphicon glyphicon-calendar"></span> Datum</a>-->
                    <a href="#" class="btn btn-warning survey-component" id="help"><span class="glyphicon glyphicon-question-sign"></span> Hjälp</a>
                </div>
            </div>
        </div>

        <div class="col-md-2 pull-right">
            <div style="position: fixed;max-width: 180px;" class="panel panel-warning bootstro" data-bootstro-title="Släng saker du inte vill ha" data-bootstro-content="Detta är din papperskorg, släng saker du inte vill ha här." data-bootstro-placement="bottom" data-bootstro-width='272px' data-bootstro-step="3">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-trash"></span> Papperskorg
                    </h3>
                </div>
                <div class="panel-body dropzone">
                </div>
            </div>
        </div>

        <div class="col-md-8 pull-right" >
            <div class="panel panel-info resize bootstro" data-bootstro-title="Bygg upp din enkät här" data-bootstro-content="Dra hit de olika sorters frågor du vill ha med i din enkät" data-bootstro-placement="left" data-bootstro-step="2">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-wrench "></span> Din layout
                    </h3>
                </div>
                    <div id="formLayoutDropzoneDiv" class="panel-body dropzone"></div>
                    <div style="z-index: 90; " class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se"></div>
            </div>

        </div>

    </div>
</div>
<?php require_once("formFieldTemplates.php");?>

<script>
    $(document).on("click",".addAlternative",function(){
        var place = $(this);
        var createRadio = $(this).hasClass("newRadioAlternative");
        var optionsName = place.closest("div").attr("name");
        bootbox.prompt("Ange svarsalternativet", function(alternative) {
            if (alternative === null)
                return; //skit i resten om användaren inte anger en fråga
            var clone,title;
            if(createRadio){
                clone = $("#radioField").children("label").clone();
            }else{
                clone  = $("#checkboxField").children("label").clone();
            }
            //närmaste diven har ett unikt namn vi kan använda
            clone.children("input").attr("name",optionsName);
            title = $("#optionText").clone();
            title.attr("id",$(".optionText").length);
            title.html(alternative);
            clone.prepend(title);
            $(clone).insertBefore(place);
        });
    });
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
        $("#help").click(function(){
            // Survey-components kan inte ha classen draggable när vi kör bootstro, highlight slutar fungera då.
            // Vi tar därför bort classen innan vi kör.
            // När vi är klara lägger vi tillbaka classen för att få rätt z-index som hör till classen.
            startBootstro();
        });
    });
    function startBootstro(){ 
        $('.survey-component').removeClass('draggable');
        $('.panel-body').removeClass('dropzone');    
        bootstro.start(".bootstro", {
                //Bestämmer att det inte går att klicka i backgrunden för att gå ur guiden.
            stopOnBackdropClick : false,
            nextButtonText : 'Nästa»',
            prevButtonText : '«Tillbaka',
            finishButtonText : 'Avsluta guiden',
            onComplete : function(params)
            {

            },
            onExit : function(params)
            {
                $('.survey-component').addClass("draggable");
                $('.panel-body').addClass('dropzone');
            }
        });
    };
    function initialize() {
        //fungerar men det fattas något visuellt för att visa att det faktiskt går att göra om storleken
        $( ".resize" ).resizable({
            animate: true,
            ghost: true
        });
        $('.survey-component').tooltip();
        $(".draggable" ).draggable({
            revert: true,
            //har kvar dessa ifall vi kommer på att vi behöver dem senare
            start: function(event,ui){
            },
            stop: function(event,ui) {

            }
        });
        function appendNewFormElements(question,formFieldType){
            //clona rätt template element
            var questionTemplate = $("#questionTemplate").clone();
            questionTemplate.children(":last-child").html(question);
            var clone = $("[name="+formFieldType+"Template]").clone();
            //hämta antalet likadana element i dropzone för att kunna ge unikt namn
            var currentNumberOfTextFields = $("#formLayoutDropzoneDiv ."+formFieldType+"Template");
            //byt ut name attributet till något unikt med hjälp av antalet ovan
            clone.attr("name",formFieldType+currentNumberOfTextFields.length);
            //kasta in nya elementet sist i diven
            $("#formLayoutDropzoneDiv").append(clone);
            //kasta in frågan i clone elementet men före formulärfältet
            clone.prepend(questionTemplate);
        }
        $( ".dropzone" ).droppable({
            drop: function( event, ui ) {
                if(!$('.panel-body').hasClass('dropzone')){
                    return;
                }
                if($(this).attr("id") =="formLayoutDropzoneDiv"){
                    bootbox.prompt("Formulera din fråga här:", function(question) {
                        if (question  === null)
                            return; //skit i resten om användaren inte anger en fråga
                        //vad man valde för typ
                        var formFieldType = ui.draggable.attr("id");
                        //defaultVärde
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
    };
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
    #help{
        margin-top: 25px;
    }
    body {
        margin-top:55px;
    }
    .bootstro-highlight {
        background-color:white;
    }
    .wrapper-component {
        text-align: center;
    }
    .survey-component {
        width: 75%;
    }
</style>
