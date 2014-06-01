<tr class="accordion-heading">
	<td>
		<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
		<?php echo $form->hiddenField($conversation, "[$index]id"); ?>
	</td>

    <td class="clickable accordion-heading accordion-toggle "
        data-toggle="collapse" href="#acc<?= $index;?>">
            <?php
                if($conversation->recruiterId== Yii::app()->user->id){
                    echo $conversation->publisher->getFullName();
                }
            else{
                echo $conversation->recruiter->user->getFullName();
                }
            ?>
	</td>
    <td class="clickable accordion-heading accordion-toggle down"
        data-toggle="collapse" href="#acc<?= $index;?>">
        <?php
            echo $conversation->title;
        ?>
    </td>
    <td class="clickable accordion-heading accordion-toggle down"
        data-toggle="collapse" href="#acc<?= $index;?>">
        <a class="glyphicon glyphicon-arrow-down down"
           data-toggle="collapse" href="#acc<?= $index;?>">
       </a>
	</td>
</tr><!-- end table row -->
<tr class="col-md-12">
	<td colspan="4">
		<div id="acc<?= $index; ?>" class="accordion-body collapse" style="padding:0px;">
			<div class="accordion-inner">
				<div class="panel-body"
				     style="min-height: 50px;">
					<?php
                    //    echo $conversation;
$this->renderPartial(Yii::app()->getModule('message')->viewPathConversation . "/view", array(
							"model" => $conversation,
//							"receiverName" => $message->getReceiverName(),
//							"senderName" => $message->getSenderName())
						));
                    ?>
				</div>
			</div>
		</div>
	</td>
</tr><!-- end hidden table row -->