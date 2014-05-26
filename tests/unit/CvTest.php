<?php
require_once('/../../yii/framework/yii.php');
//require_once('Cv.php');
//require_once('/../../yii/framework/test/CDbTestCase.php');
$config=dirname(__FILE__).'/../../protected/models/CV.php';
Yii::createWebApplication($config);

class CvTest extends PHPUnit_Framework_TestCase
{

    public function setUp(){

    $this->db =new CDbConnection('mysql:host=atlas.dsv.su.se;dbname=pvt14Group1','pvt14Group1','ohfephaenahb');
    $this->db->active=true;
    CActiveRecord::$db=$this->db;
    
     }
    public function tearDown(){
    }

    public function testTableName()
    {
    	$newcv =new CV();
        // test to ensure that the object from an fsockopen is valid
       //$cv = new Cv();
        $this->assertTrue($newcv->tableName()=="Cv");

    }
}
?>