
<li id="chatLi<?=$message->id;?>" class="left clearfix">
	<span class="chat-img pull-left">
		<img src="http://placehold.it/50/55C1E7/fff&text=<?=t("Du");?>" alt="User Avatar" class="img-circle"/>
	</span>
	<div class="chat-body clearfix">
		<div class="header">
			<strong class="primary-font"><?php echo $message->getSenderName();?></strong>
			<small class="pull-right text-muted">
				<span class="glyphicon glyphicon-time"></span>
				<?php echo date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at));?>
			</small>
		</div>
		<p>
			<?php echo $message->body;?>
		</p>
	</div>
</li>