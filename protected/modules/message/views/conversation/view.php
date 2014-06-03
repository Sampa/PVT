<?php
/* @var $this ConversationController */
/* @var $model Conversation */

$this->breadcrumbs=array(
	Yii::t("t","Hem")=>Yii::app()->getHomeUrl(),
    Yii::t("t", "Meddelanden"),
	$model->title,
);
$to=null;
if($model->recruiterId== Yii::app()->user->id){
    $to=$model->publisher;
}else{
    $to=$model->recruiter->user;
}

?>
<div class="col-md-12 col-lg-12 col-sm-12">
        <div class="btn-group col-md-12 row" style="margin-bottom: 10px;">
            <a  class="chatHistoryToggle pull-right" data-toggle="collapse" data-parent="#accordion" href="#chatUl<?=$to->id;?>">
                <?php echo t("Visa/Dölj historik");?>
            </a>
        </div>
        </div>
        <div class="panel-body" id="chatHistoryDiv<?=$model->id;?>">
            <ul class="chat" id="chatUl<?=$to->id;?>">
                <?php
                foreach ($model->messages as $message):
                    if($message->receiver_id == user()->id){
                        $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_receivedTemplate',array("message"=>$message));
                    }else{
                        $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_sentTemplate',array("message"=>$message));
                    }
                endforeach;
                ?>
            </ul>
        </div>
        <div class="panel-footer " style="min-height: 70px;">
            <div id="fields" class="col-md-12 padding:0px;margin:0px;">
                <div class="col-md-10 col-lg-10 col-sm-8">
                    <input class="form-control"
                           placeholder="<?=t('Skriv nytt meddelande...');?>"
                           name="Message[body]"
                           id="Message_body<?= $to->id; ?>"
                           type="text"
                           style="margin: 0px;"
                        />
                </div>
                <input
	               id="btn-chat<?= $to->id; ?>"
                   data-url="<?=Yii::app()->baseUrl;?>message/conversation"
                   data-content="<?=$model->id;?>"
                   class="col-md-2 col-lg-2 col-sm-2 btn-warning btn sendChatMessage"
                   name="<?= $to->getFullName(); ?>"
                   value="<?=t("Skicka");?>"
                   type="submit"
	            />
            </div>
        </div>
<script>
    $(".chatHistoryToggle").on('click',function(){
        var iconElement = $(this).children("span");
        if(iconElement.hasClass("up")){
            iconElement.removeClass("up");
            iconElement.removeClass("glyphicon-arrow-up");
            iconElement.addClass("glyphicon-arrow-down");
        }else{
            iconElement.removeClass("glyphicon-arrow-up");
            iconElement.addClass("up");
            iconElement.addClass("glyphicon-arrow-down");
        }
    });
    $(document).ready(function(){
        setTimeout(chatUpdateTime(<?=$to->id;?>), 1000);
    });
</script>