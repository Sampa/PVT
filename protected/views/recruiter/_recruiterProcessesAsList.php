<li>
<?php
    if($loggedInRecruiter){
        foreach($processes as $process){
            echo $process->title;
        }
    }
?>
</li>
