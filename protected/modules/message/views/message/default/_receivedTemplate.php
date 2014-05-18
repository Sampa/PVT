<li id="chatLi<?=$message->id;?>" lass="right clearfix">
	<span class="chat-img pull-right">
		<img src="http://placehold.it/50/FA6F57/fff&text=Den" alt="User Avatar" class="img-circle"/>
	</span>
	<div class="chat-body clearfix">
		<div class="header">
			<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>
				<?php echo date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at));?>
			</small>
			<strong class="pull-right primary-font"><?=$message->getSenderName();?></strong>
		</div>
		<p>
			<?php echo $message->body;?>
		</p>
	</div>
</li>