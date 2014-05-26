<?php echo CHtml::form(); ?>
	<div id="langdrop">
		<?php
        echo CHtml::dropDownList('_lang', $currentLang, array(
			'en' => 'English',
			'sv' => 'Svenska',
			'de' => 'Rappakalja',
		)); ?>
		<button><?=t("Byt språk");?></button>
	</div>

<?php echo CHtml::endForm(); ?>