<?php
	return array(
	'components'=>array(
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=linn',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8',
				'tablePrefix' => 'tbl_',
				 'enableParamLogging' => true,	
			),
		)
	)
?>