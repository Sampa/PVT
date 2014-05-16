<div class="list-group">
    <a href="<?php echo $this->createUrl('inbox/');?>" class="list-group-item ">
        <span class="list-group-item-heading"><?php echo t("Inkorg");?></span>
        <span class="badge">
             <?php
                echo (Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId())) ?
                 Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId()) : 0; ?>
        </span>
        <p class="list-group-item-text">

        </p>
    </a>
    <a href="<?php echo $this->createUrl('sent/');?>" class="list-group-item ">
        <span class="list-group-item-heading"><?php echo t("Skickade");?></span>
        <p class="list-group-item-text">

        </p>
    </a>
    <a href="<?php echo $this->createUrl('compose/') ?>" class="list-group-item ">
        <span class="list-group-item-heading"><?php echo t("Nytt");?></span>
        <p class="list-group-item-text">

        </p>
    </a>
</div>

<?php if(Yii::app()->user->hasFlash('messageModule')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('messageModule'); ?>
	</div>
<?php endif; ?>
