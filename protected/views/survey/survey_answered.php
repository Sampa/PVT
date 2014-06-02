
<h2 style="margin-top: 0;color:#55518a"><?=t("Besvarade enkäter");?></h2>
<?php
    /*
     * @surveys alla kandidate object SurveyCandidate enkäter för den inloggade användaren
     */
    //loopa igenom surveyCandidate info för att få ut relevant survey
    foreach($surveys as $survey):
    ?>
            <h4><?=CHtml::link($survey->title,$this->createUrl("/survey/view",array("id"=>$survey->id)));?></h4>
    <hr/>
    <?php endforeach;?>