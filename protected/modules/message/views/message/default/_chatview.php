<div style="display:block;" id="chatDiv">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-comment"></span> Chat med <?php echo $senderName; ?>
						<div class="btn-group pull-right">
							<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-chevron-down"></span>
							</button>
							<ul class="dropdown-menu slidedown">
								<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                            </span>Refresh</a></li>
								<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-ok-sign">
                            </span>Available</a></li>
								<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-remove">
                            </span>Busy</a></li>
								<li><a href="http://www.jquery2dotnet.com"><span
											class="glyphicon glyphicon-time"></span>
										Away</a></li>
								<li class="divider"></li>
								<li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
										Sign Out</a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<ul class="chat" id="chatUl<?=$model->sender->id;?>">
							<?php
								foreach (Message::getAdapterForHistory($model->sender_id)->data as $index => $message):
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
								       id="Message_body<?= $model->sender_id; ?>" value="hej" type="text"/>
								<input id="btn-chat<?= $model->sender_id; ?>" class="btn-warning btn sendChatMessage"
								       name="<?= $senderName; ?>" value="Skicka" type="submit"/>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>