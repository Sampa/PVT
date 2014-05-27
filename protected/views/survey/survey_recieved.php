<h2 style="margin-top: 0;color:#55518a"><?=t("Obesvarade enkäter");?></h2>
<?php
    /*
     * @surveys alla kandidate object SurveyCandidate enkäter för den inloggade användaren
     */
    //loopa igenom surveyCandidate info för att få ut relevant survey
    foreach($surveys as $candidate): ?>
        <a href="<?=$this->createUrl("/survey/respond/".$candidate->survey->id,array());?>">
            <?=$candidate->survey->title;?>
        </a>
        <hr/>
    <?php endforeach;?>

