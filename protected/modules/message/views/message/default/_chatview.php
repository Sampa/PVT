<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<span class="glyphicon glyphicon-comment"></span> 
			<?php 
				$to=null;
				echo t("Historik för dig och ");
				if($model->sender_id== Yii::app()->user->id){
					echo $receiverName;
					$to=$model->receiver;
				}else{
					echo $senderName;
					$to=$model->sender;
				}
			?>
			<div class="btn-group pull-right">
				<a  class="chatHistoryToggle" data-toggle="collapse" data-parent="#accordion" href="#chatHistoryDiv">
					<span class="glyphicon glyphicon-arrow-down"></span>
				</a>
			</div>
		</div>
		<div class="panel-body "id="chatHistoryDiv">
			<ul class="chat" id="chatUl<?=$to->id;?>">
				<?php
					foreach (Message::getAdapterForHistory($to->id)->data as $index => $message):
						if($message->receiver_id == user()->id){
							$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_receivedTemplate',array("message"=>$message));
						}else{
							$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_sentTemplate',array("message"=>$message));
						}
					endforeach;
				?>
			</ul>
		</div>
		<div class="panel-footer" style="min-height: 70px;">
			<div class="col-md-11 col-lg-11 col-sm-8 row">
				<span class="input-group input-group-btn">
					<input class="form-control col-md-10 col-lg-10 col-sm-6"
					       placeholder="Skriv ditt meddelande här..." name="Message[body]"
					       id="Message_body<?= $to->id; ?>" type="text"/>
					<input id="btn-chat<?= $to->id; ?>" data-url="<?=$this->createUrl("conversation/");?>" class="btn-warning btn sendChatMessage"
					       name="<?= $to->getFullName(); ?>" value="<?=t("Skicka");?>" type="submit"/>
				</span>
			</div>
		</div>
	</div>
</div>
<script>
	$(".chatHistoryToggle").on('click',function(){
		var iconElement = $(this).children("span");
		if(iconElement.hasClass("down")){
			iconElement.removeClass("down");
			iconElement.removeClass("glyphicon-arrow-down");
			iconElement.addClass("glyphicon-arrow-up");
		}else{
			iconElement.removeClass("glyphicon-arrow-up");
			iconElement.addClass("down");
			iconElement.addClass("glyphicon-arrow-down");
		}
	});

	function chatUpdateTime(){
		var toid=<?php echo $to->id;?>;
		$.ajax({
			dataType: "json",
			type: "POST",
			url: "/message/inbox/getUnreadMessages",
			data: {
				receiver_id : toid
			}

		}).done(function(data){
			if(data.status=="ok"){
				$("#chatUl"+toid).append(data.html);
			}
		});
		setTimeout(chatUpdateTime, 2000);
	}
	setTimeout(chatUpdateTime, 2000);
</script>