<?php
/* @var $this SurveyController */
/* @var $model Survey */
$this->breadcrumbs=array(
    Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    t('Enkäter')=>array('admin'),
	$model->title,
);
    ?>

    <h5><?=t("Skapades ").$model->date;?></h5>
    <h3><?=t("Enkätens frågor");?></h3>
    <?php
    foreach($model->surveyQuestions as $q){
        echo "<h6>".$q->question."</h6>";
    }
?>
<h3><?=t("Enkäten besvarad av");?></h3>
<?php
    foreach($model->surveyCandidates as $candidate){
        if($candidate->answered){
            //link tar tre parametrar, länktexten, urlen,och en array av html attribut och skriver ut en <a> tag
            echo CHtml::link(
                $candidate->user->getFullName().t(" ( Se svar )"),
                "#",
                array("class"=>"userAnswerModal","id"=>"linkToAnswers".$candidate->user->id)
            );
            echo "<br/>";
            echo CHtml::tag("div",array("id"=>"answersDiv".$candidate->user->id,"class"=>"hidden"));
            $questionNumber = 1;
            foreach($model->surveyQuestions as $question){
                $answer = $question->getAnswerByUser($candidate->user->id);
                echo "<h4> Fråga ".$questionNumber. " - " .$question->question."</h4>";
                echo "Svar: ";
                echo $answer->questionAnswer;
                $questionNumber++;
            }
            echo CHtml::closeTag("div");
        }
    }
?>
<script>
    $(".userAnswerModal").on("click",function(){
        var id = $(this).attr("id").replace("linkToAnswers","");
        bootbox.dialog({
            message: $("#answersDiv"+id).html(),
            title: "<?=t("Enkätsvar");?>",
            buttons: {
                success: {
                    label: "<?=t("Stäng");?>",
                    className: "btn-success",
                    callback: function() {
                    }
                }
            }
        });
    });
</script>