<tr class="accordion-heading">
	<td>
		<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
		<?php echo $form->hiddenField($message, "[$index]id"); ?>
	</td>
	<td class="clickable accordion-heading accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
		5
	</td>
	<td class=" accordion-heading" href="#acc<?= $index; ?>">
		<a href="<?=$this->createUrl("view/",array("id"=>$message->sender_id));?>"><?php 
		if($message->sender_id== Yii::app()->user->id){
			echo $message->getReceiverName();
		} 
		else{
			echo $message->getSenderName();
		}
			?></a>

			
	</td>
	<td class="clickable accordion-heading accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
		Ja
	</td>
	<td
		class="glyphicon glyphicon-arrow-down clickable accordion-heading accordion-toggle down"
		data-toggle="collapse"
		href="#acc<?= $index; ?>">
	</td>
</tr><!-- end table row -->
<tr>
	<td colspan="5">
		<div id="acc<?= $index; ?>" class="accordion-body collapse" style="padding:0px;">
			<div class="accordion-inner">
				<div class="panel-body"
				     style="min-height: 400px;">
					<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . "/_chatview", array(
							"model" => $message,
							"receiverName" => $message->getReceiverName(),
							"senderName" => $message->getSenderName())
						);?>
				</div>
			</div>
		</div>
	</td>
</tr><!-- end hidden table row -->