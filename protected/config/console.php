<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',
    'import'=>array(
    		'application.models.*',
    	//	'application.components.*',
         //   'application.extensions.yiibooster.components.*'
    	),
	// application components
	'components'=>array(
	/*	'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
        'db' => array(       //SERVER
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=atlas.dsv.su.se;dbname=pvt14Group1;',
            'username' => 'pvt14Group1',
            'password' => 'ohfephaenahb',
            'charset' => 'UTF8',
            'tablePrefix' => '',
            'emulatePrepare' => true,
//               'enableProfiling' => true,
//            'schemaCacheID' => 'cron',
//            'schemaCachingDuration' => 1
        ),
	)

);