<tr class="accordion-heading">
	<td>
		<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
		<?php echo $form->hiddenField($message, "[$index]id"); ?>
	</td>
	<td class=" accordion-heading" href="#acc<?= $index; ?>">
		<a href="<?=$this->createUrl("view/",array("id"=>$message->sender_id));?>"><?php echo $message->getSenderName();?></a>
	</td>
	<td class="clickable accordion-heading accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
		<a href="<?php echo $this->createUrl('view/', array('message_id' => $message->id)) ?>"><?php echo $message->subject ?></a>
	</td>
	<td class="clickable accordion-heading accordion-toggle" data-toggle="collapse" href="#acc<?= $index; ?>">
		<span class="date"><?php echo date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at)) ?></span>
	</td>
	<td
		class="glyphicon glyphicon-arrow-down chatToggle accordion-heading accordion-toggle down"
		data-toggle="collapse"
		href="#acc<?= $index; ?>">
	</td>
</tr><!-- end table row -->
<tr>
	<td colspan="5">
		<div id="acc<?= $index; ?>" class="accordion-body collapse" style="padding:0px;">
			<div class="accordion-inner">
				<div class="panel-body"
				     style="min-height:;">
					<h1><?=$message->body;?></h1>
				</div>
			</div>
		</div>
	</td>
</tr><!-- end hidden table row -->
