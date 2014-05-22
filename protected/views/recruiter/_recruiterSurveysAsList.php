<?php
    if(count($surveys)<1)
        echo "<li>".Yii::t("t","Du har inga enkäter nu")."</li>";
    else{
        foreach($surveys as $survey):?>
            <li id="<?=$survey->id;?>" class="listOfSurveys" role="presentation">
                <a role="menuitem" tabindex="-1" href="#">
                   <?php echo $survey->title;?>
                </a>
            </li>
        <?php endforeach;
    }
?>

<script>
    $(".listOfSurveys").on("click",function(){
       var title = $(this).children("a").html();
       $("#surveyNameButton").html(title);
       $("#surveyNameButton").attr("title",$(this).attr("id"));
    });
</script>