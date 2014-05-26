<?php
//require_once('/../../yii/framework/yii.php');
//require_once('./../../protected/models/Cv.php');
require_once('/../../yii/framework/test/CDbTestCase.php');
$config=dirname(__FILE__).'/../../protected/models/Cv.php';
Yii::createWebApplication($config);

class CvTest extends CDbTestCase
{
	public function setUpConfig(){

}
    public function setUp(){


    $this->db =new CDbConnection('mysql:host=atlas.dsv.su.se;dbname=pvt14Group1','pvt14Group1','ohfephaenahb');
    $this->db->active=true;
    CActiveRecord::$db=$this->db;
    
     }
    public function tearDown(){ 
  //Yii::app()->$config->destroy();
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