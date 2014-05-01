<?php

defined('DS') or define('DS',DIRECTORY_SEPARATOR);
$yiic=dirname(__FILE__).'/../yii/framework/yiic.php';
$config=dirname(__FILE__).'/config/console.php';
$shortcuts=dirname(__FILE__).DS .'helpers'.DS .'shortcuts.php';
$utils=dirname(__FILE__).DS.'helpers'.DS .'utils.php';
require($shortcuts);
require($utils);
require_once($yiic);
