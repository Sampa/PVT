
<div class="container">
	<div class="navbar navbar-inverse  yamm">
		<div id="navbar-collapse-2" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<!-- Media Example -->
				<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Inkorg<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<div class="yamm-content">
								<ul class="media-list">
									<?php
										$incomingMessages = Message::getAdapterForInbox(Yii::app()->user->getId());
										foreach($incomingMessages->data as $index=>$message):
									?>
									<li class="media">
											<a href="<?=$this->createUrl("view/",array("id"=>$message->sender_id));?>" class="pull-right">
												<h4>
													<?=$message->getSenderName();?>
												</h4>
											</a>
										<div class="media-body">
											<?=date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at));?>
											<h4 class="media-heading"><?=t("Rubrik: ").$message->subject;?></h4>
											<?=$message->body;?>
										</div>
										<hr/>
									</li>
									<?php endforeach;?>
									<li class="media"><a href="#" class="pull-right"><img src="http://placekitten.com/64/64/" alt="64x64" class="media-object"></a>
										<div class="media-body">
											<h4 class="media-heading">Media heading</h4>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.
										</div>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</li>
				<!-- Skickade -->
				<li class="dropdown yamm-fullwidth "><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?=t("Skickade");?><b class="caret"></b></a>
					<ul class="dropdown-menu col-md-10 col-lg-10 col-sm-6">
						<li>
							<div class="yamm-content">
								<?=$sent;?>
							</div>
						</li>
					</ul>
				</li>
				<!-- Konversationer -->
				<li class="dropdown yamm-fullwidth "><a href="#" data-toggle="dropdown" class="dropdown-toggle"><?=t("Konversationer");?><b class="caret"></b></a>
					<ul class="dropdown-menu col-md-10 col-lg-10 col-sm-6">
						<li>
							<div class="yamm-content">
								<?=$inbox;?>
							</div>
						</li>
					</ul>
				</li>
				<!-- Thumbnails demo -->
				<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Thumbnails<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li>
							<div class="yamm-content">
								<div class="row">
									<div class="col-sm-4">
										<div class="thumbnail"><img alt="260x130" src="http://placekitten.com/260/130/">
											<div class="caption">
												<h3>Thumb Label</h3>
												<p>Mazagran doppio half and half aftertaste organic, rich doppio</p>
												<p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn btn-default">Action</a></p>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="thumbnail"><img alt="260x130" src="http://placekitten.com/260/130/">
											<div class="caption">
												<h3>Thumb Label</h3>
												<p>Black latte cinnamon, cultivar trifecta crema cappuccino</p>
												<p><a href="#" class="btn btn-primary">Action</a> <a href="#" class="btn btn-default">Action</a></p>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="thumbnail"><img alt="260x130" src="http://placekitten.com/260/130/">
											<div class="caption">
												<h3>Thumb Label</h3>
												<p>Bar roast et, as latte café au lait, mocha aromatic robusta</p>
												<p><a href="#" class="btn btn-primary">Action </a> <a href="#" class="btn btn-default">Action </a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<!-- Forms -->
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">
						<span class="glyphicon glyphicon-envelope"></span> <?=t("Nytt");?>
					</a>
					<ul class="dropdown-menu col-lg-6 col-md-6">
						<li>
							<div class="yamm-content ">
								<?php
								if(isset($sent)){
									$id=1;
									$message = new Message("compose");
									$this->performAjaxValidation($message);
									if (Yii::app()->request->getPost('Message')) {
										$receiverName = Yii::app()->request->getPost('receiver');
										$message->attributes = Yii::app()->request->getPost('Message');
										$message->sender_id = Yii::app()->user->getId();
										if ($message->save()) {
											Yii::app()->user->setFlash('messageModule', MessageModule::t('Message has been sent'));
											$this->redirect($this->createUrl('inbox/'));
										} else if ($message->hasErrors('receiver_id')) {
											$message->receiver_id = null;
											$receiverName = '';
										}
									} else {
										if ($id) {
											$receiver = call_user_func(array(call_user_func(array(Yii::app()->getModule('message')->userModel, 'model')), 'findByPk'), $id);
											if ($receiver) {
												$receiverName = call_user_func(array($receiver, Yii::app()->getModule('message')->getNameMethod));
												$message->receiver_id = $receiver->id;
											}
										}
									}
									$this->renderPartial(Yii::app()->getModule('message')->viewPath . '/compose', array('inbox'=>$this->getInboxContent(),'model' => $message, 'receiverName' => isset($receiverName) ? $receiverName : null));
								}
								?>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>