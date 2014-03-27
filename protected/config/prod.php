<?php
	return array(
	'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=mydb25.surftown.se;dbname=Drini_skeleton',
				'emulatePrepare' => true,
				'username' => 'Drini_root',
				'password' => 'dagols',
				'charset' => 'utf8',
				'tablePrefix' => 'tbl_',
				 'enableParamLogging' => true,
			)
		)
	)
?>