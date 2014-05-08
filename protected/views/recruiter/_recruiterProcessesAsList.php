<?php
    if(count($processes)<1)
        echo "<li>".Yii::t("t","Du har inga processer nu")."</li>";
    else{
        foreach($processes as $process){
            echo "<li>".$process->title."</li>";
        }
    }

?>

