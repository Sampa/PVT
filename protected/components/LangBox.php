<?php
class LangBox extends CWidget
{
	public function run()
	{
		$currentLang = Yii::app()->getLanguage();
		$this->render('langBox', array('currentLang' => $currentLang));
	}
}
?>