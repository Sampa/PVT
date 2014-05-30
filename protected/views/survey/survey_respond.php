<?php
$model = new SurveyForm();
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'enableClientValidation' => true,
    'action'=>  "/survey/respond",
    //'enableAjaxValidation'=>true,
    // 'errorMessageCssClass'=>'has-error',
    'htmlOptions' => array('class' => '','role' => 'form','id' => 'survey-form'),
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'errorCssClass' => 'has-error',
        'successCssClass' => 'has-success',
        'inputContainer' => '.form-group',
        'validateOnChange' => true
    ),
));
/*
 * @surveys alla kandidate object SurveyCandidate enkäter för den inloggade användaren
 */
//loopa igenom surveyCandidate info för att få ut relevant survey
    echo "<h3>".$survey->title."</h3>";
    //loopa igenom enkätens frågor
    foreach($survey->surveyQuestions as $q){
        $model->addAttribute($q->question,$q->id);
        if($q->haveOptions == 1){
            //initiera array av settings för formulärfältet
            $options = array();
            //loopa svarsalternativen
            foreach($q->options as $option){
                //lägg till det i vår array över tillgängliga svarsalternativ
                $options[$option->text] =$option->text;
            }
            //om man ska kunna välja flera skapa checkboxes annars radiobuttons
            if($q->allowMultipleChoice==1){
                echo $form->checkboxList($model,$q->question,$options,array('class'=>''));
            }else{
                echo $form->radioButtonList($model,$q->question,$options);
            }
        }else{
            if($q->type=="textfield"){
                echo $form->textFieldControlGroup($model,$q->question,array("class"=>"form-control"));
            }else{
                echo $form->textAreaControlGroup($model,$q->question,array("class"=>"form-control"));
            }
        }
        echo $form->hiddenField($model,"surveyId",array("value"=>$survey->id));
    }
    echo TbHtml::submitButton(t('Svara'),array(
        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
        'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
));
$this->endWidget();
