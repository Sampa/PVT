<?php
//require_once('../../yii/framework/yii.php');
//require_once('../../protected/models/Hotlist.php');
  $config=dirname(__FILE__).'/../../protected/models/Hotlist.php';
  Yii::createWebApplication($config);

class HotlistTest extends PHPUnit_Framework_TestCase
{
  public function setUpConfig(){

}
  public function setUp(){


    $this->db =new CDbConnection('mysql:host=atlas.dsv.su.se;dbname=pvt14Group1','pvt14Group1','ohfephaenahb');
    $this->db->active=true;
    CActiveRecord::$db=$this->db;
  }
  public function tearDown(){ 
 // Yii::app()->$config->destroy();
}
  public function testSaveCvId()
  {
    // test to ensure that the object from an fsockopen is valid
    $hotlist = new Hotlist();
    //$hotlist->cvId = "Testing hotlist";
    //$this->assertTrue($hotlist->save());
	 $this->assertTrue($hotlist->tableName()=="HotList");
  }
}


?>