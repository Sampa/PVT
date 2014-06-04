<?php
    if(count($processes)<1)
        echo "<li>".Yii::t("t","Du har inga processer nu")."</li>";
    else{
        foreach($processes as $process){
            echo '<li data-url="'.Yii::app()->baseUrl.'/recruitmentprocess/savecv" class="listOfProcesses" id="'.$process->id.'" role="presentation"><a role="menuitem" tabindex="-1" href="#">'.$process->title."</a></li>";
        }
    }

?>

