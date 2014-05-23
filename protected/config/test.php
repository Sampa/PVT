<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'import'=>array(
				'applications.models.*'),
			),
			// uncomment the following to provide test database connection
			'db'=>array(
				'connectionString'=>'mysql:host=atlas.dsv.su.se;dbname=pvt14Group1;',
			),
			
		),
	)
);
