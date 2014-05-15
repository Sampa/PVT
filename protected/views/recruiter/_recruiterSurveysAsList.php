<?php
    if(count($surveys)<1)
        echo "<li>".Yii::t("t","Du har inga enkäter nu")."</li>";
    else{
        foreach($surveys as $survey){
            echo '<li class="listOfSurveys" role="presentation"> <a role="menuitem" tabindex="-1" href="#">'.$survey->title."</a></li>";
        }
    }

?>

