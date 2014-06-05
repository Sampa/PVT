<?php $this->pageTitle = Yii::app()->name . ' - ' . t("Inkorg"); ?>
	<?php if ($messagesAdapter->data): ?>
		<?php $form = $this->beginWidget('TbActiveForm', array(
			'id' => 'message-delete-form',
			'enableAjaxValidation' => false,
			'action' => $this->createUrl('delete/')
		)); ?>
		<div class="tableWrapper col-sm-12 col-lg-12 col-md-12">
					<div class="panel panel-success">
						<div class="panel-heading messagesHeading">
							<h3 class="panel-title"><?=t("Konversationer");?></h3>
						</div>
						<div class="panel-body messagesBody">
							<input
								type="text"
								class="form-control"
								id="task-table-filter"
								data-action="filter"
						    		data-filters="#task-table"
								placeholder="<?=t("Sök");?>"
							/>
						</div>
						<table class="table table-hover" id="task-table">
							<thead>
								<tr>
									<th><span class="glyphicon glyphicon-trash"></span></th>
									<th><span class="glyphicon glyphicon-user"></span></th>
									<th><span class="glyphicon glyphicon-info-sign"></span></th>
									<th>
                                        <span class="glyphicon glyphicon-envelope"></span>
<!--                                        <span class="glyphicon glyphicon-export"></span>-->
<!--                                        <span class="glyphicon glyphicon-import"></span>-->
                                    </th>
									<th><span class="glyphicon glyphicon-comment"></span></th>
								</tr>
							</thead>
							<tbody>
							<div class="accordion">
								<div class="accordion-group">
    							<?php
								$user = User::model()->findByPk(user()->id);
							    $conversations = $user->getConversations();
							    foreach($conversations as $conversation){
									$this->renderPartial(Yii::app()->getModule('message')->viewPath . "/_conversationRowTemplate", array(
											"form"=>$form,
											"index"=>$conversation->id,
                                            "conversation"=>$conversation,
                                      ));
							    }
                                ?>
								</div><!-- accordion-group-->
							</div>
							</tbody>
						</table>
					</div>
            <div class="row buttons">
                <?php echo CHtml::submitButton(t("Ta bort markerade"), array("class" => "btn btn-danger")); ?>
            </div>
            <?php $this->endWidget(); ?>
            <?php $this->widget('TbPager', array('pages' => $messagesAdapter->getPagination())) ?>
        </div> <!-- end tablewrapper -->
	<?php endif; ?>
<style>
	.tableWrapper > .row{
		padding: 0 10px;
	}
	.tableWrapper .clickable{
		cursor: pointer;
	}

	.messagesHeading div {
		margin-top: -18px;
		font-size: 15px;
	}

</style>
