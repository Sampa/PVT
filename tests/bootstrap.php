<?php

// change the following paths if necessary
echo getcwd();
echo "Printed paths";
require_once('yii/framework/yii.php');
$yiit=dirname(__FILE__).'/../yii/framework/yiit.php';
$config=dirname(__FILE__).'/unit/';
//$_SERVER['REQUEST_URI'] = 'index-test.php';

//require_once($yiit);
//require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
