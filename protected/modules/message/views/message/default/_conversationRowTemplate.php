<tr class="accordion-heading">
	<td>
		<?php echo CHtml::checkBox("Message[$conversation->id][selected]"); ?>
		<?php echo $form->hiddenField($conversation, "[$conversation->id]",array("value"=>$conversation->id)); ?>
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
    <td class="clickable accordion-heading accordion-toggle"
        data-toggle="collapse" href="#acc<?= $index;?>">
        <?php
            echo $conversation->title;
        ?>
    </td>

    <td class="clickable accordion-heading accordion-toggle"
        data-toggle="collapse" href="#acc<?= $index;?>">
        <span class="badge alert-success"><?=$conversation->messageCountPerConversation();?></span>
    </td>
    <td class="clickable accordion-heading accordion-toggle"
        data-toggle="collapse" href="#acc<?= $index;?>">
        <a class="glyphicon glyphicon-arrow-down down"></a>
	</td>
</tr><!-- end table row -->
<tr class="col-md-12" style="height: 0px;">
	<td colspan="5">
		<div id="acc<?= $index; ?>" class="accordion-body collapse" style="padding:0px;">
			<div class="accordion-inner">
				<div class="panel-body"
				     style="min-height: 50px;">
					<?php
                        $this->renderPartial(Yii::app()->getModule('message')->viewPathConversation . "/view", array(
							"model" => $conversation,
						));
                    ?>
				</div>
			</div>
		</div>
	</td>
</tr><!-- end hidden table row -->