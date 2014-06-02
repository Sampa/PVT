<?php echo CHtml::form("","post",array("id"=>"langform")); ?>
	<div id="langdrop" class="pull-left">
		<?php
        echo CHtml::dropDownList('_lang', $currentLang, array(
            'sv'=>t(' Svenska'),
            'en' =>t(' Engelska'),
        ),array(
            'options'=>array(
              'sv'=>array('class'=>'sv'),
              'en'=>array('class'=>'en'),
            ),
            'class'=>'form-control',
            'style'=>'width:120px;',
            'id'=>'langPicker'
        )); ?>
	</div>
<?php echo CHtml::endForm(); ?>
<script>
$(document).ready(function(){
     $(".sv").prepend("<div class='svFlag'></div>");
     $(".en").prepend("<div class='enFlag'></div>");
    $("#langPicker").on("change",function(){
        $("#langform").submit();
    });
});
</script>