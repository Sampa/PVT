    <?php
    /* @var $this SurveyController */
    /* @var $model Survey */
    $this->breadcrumbs=array(
        Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
        t('Enkäter')=>array('admin'),
        $model->title,
        );
        ?>
        <?php
        $numberOfAnswers = 0;
        foreach($model->surveyCandidates as $candidate){
            if($candidate->answered){
                $numberOfAnswers++;
            }
        }
        if($numberOfAnswers != 0)
            $numberOfAnswersInPercent = round((( $numberOfAnswers / $numberOfCandidates )*100),2);
        ?>
        <center>
            <h2><?php echo $model->title;?></h2>
            <hr>
            <h5><?=t("Skapades ").$model->date;?></h5>
            <h5>
                <?php
                if (isset($numberOfAnswersInPercent)) {
                   echo Yii::t("t","$numberOfAnswersInPercent% av de tillfrågade har besvarat enkäten. ($numberOfAnswers av $numberOfCandidates)");
               } else {
                   echo Yii::t("t","Ingen har besvarat enkäten ännu. ($numberOfAnswers av $numberOfCandidates personer)");
               }?>
           </h5>
           <a href="#showRecivers" id="showReciversBtn"><?php echo Yii::t("t","Visa mottagare");?></a><p class="footertext"></p>
           <div id="surveyReciversWrapper" style="display: none;">
            <div class="table-responsive">
                <table class="table table-striped table-condensed" style="margin: auto; width: 55%; text-align: center">
                    <tr>
                      <th style="text-align: center;">Nummer</th>
                      <th style="text-align: center;">Användarnamn</th> 
                      <th style="text-align: center;">Svarat</th>       
                  </tr> 
                  <?php
                  $reciverNumber = 1;
                  foreach($model->surveyCandidates as $candidate){
                    echo "<tr>";
                    echo "<td>#$reciverNumber</td>";
                    echo "<td>".$candidate->user->getFullName()."</td>";
                    if ($candidate->answered) 
                        echo "<td>Ja</td>";
                    else
                        echo "<td>Nej</td>";
                    echo "</tr>";
                    $reciverNumber++;
                }
                ?>
            </table>
            <br>
        </div>
    </div>
    <a href="#showQuestions" id="showQuestionsBtn"><?php echo Yii::t("t","Visa frågor");?></a><p class="footertext"></p>
</center>
<div id="surveyQuestionWrapper" style="display: none;">
    <div class="table-responsive">
        <table class="table table-striped table-condensed" style="margin: auto; width: 55%; text-align: center">
            <tr>
              <th style="text-align: center;">Nummer</th>
              <th style="text-align: center;">Text</th>      
            </tr> 
            <?php
            $questionNumber = 1;
            foreach($model->surveyQuestions as $q){
                echo "<tr>";
                echo "<td>#$questionNumber</td>";
                echo "<td>".$q->question."</td>";
                $questionNumber++;
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
<hr>
<center>
    <h3><?php echo Yii::t("t","Du har mottagit svar från följande användare: ");?></h3>
    <?php
    if (isset($numberOfAnswersInPercent)) {
        echo Yii::t("t","<h6> Klicka på namnet för att se svaret.</h6>");
    } else {
        echo Yii::t("t","<h6>Ingen har besvarat enkäten ännu.</h6>");
    }
    foreach($model->surveyCandidates as $candidate){
        if($candidate->answered){
                //link tar tre parametrar, länktexten, urlen,och en array av html attribut och skriver ut en <a> tag
            echo CHtml::link(
                $candidate->user->getFullName(),
                "#",
                array("class"=>"userAnswerModal","id"=>"linkToAnswers".$candidate->user->id)
                );
            echo "<br/>";
            echo CHtml::tag("div",array("id"=>"answersDiv".$candidate->user->id,"class"=>"hidden"));
            $questionNumber = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-condensed">
                <tr>
                    <th style="text-align: center;">Fråga</th>
                    <th style="text-align: center;">Svar</th>      
                </tr> 
                <?php
                foreach($model->surveyQuestions as $question){
                    $answer = $question->getAnswerByUser($candidate->user->id);
                    if($answer){
                        echo "<tr>";
                        echo "<td>#".$questionNumber. " - " .$question->question."</td>";
                        echo "<td>".$answer->questionAnswer."</td>";
                        echo "</tr>";
                        $questionNumber++;
                    }
                }
                ?>
                </table>
            </div>
            <?php
            echo CHtml::closeTag("div");
        }
    }
    ?>
</center>
<script>
    $("#showQuestionsBtn").on('click',function(){
        if($(this).text() == "Visa frågor")
            $(this).text("Dölj frågor");
        else
            $(this).text("Visa frågor");
        $("#surveyQuestionWrapper").slideToggle();
        $('html, body').animate({
            scrollTop: $("#surveyQuestionWrapper").offset().top
        }, 300);
    });

    $("#showReciversBtn").on('click',function(){
        if($(this).text() == "Visa mottagare")
            $(this).text("Dölj mottagare");
        else
            $(this).text("Visa mottagare");
        $("#surveyReciversWrapper").slideToggle();
        $('html, body').animate({
            scrollTop: $("#surveyReciversWrapper").offset().top
        }, 300);
    });

    $(".userAnswerModal").on("click",function(){
        var id = $(this).attr("id").replace("linkToAnswers","");
        bootbox.dialog({
            message: $("#answersDiv"+id).html(),
            title: "<center><?=t("Granska enkätsvar");?></center>",
            buttons: {
                success: {
                    label: "<?=t("Stäng");?>",
                    className: "btn-success",
                    callback: function() {}
                }
            }
        });
    });
</script>