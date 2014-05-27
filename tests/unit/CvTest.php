<?php
//require_once('/../../yii/framework/yii.php');
//require_once('Cv.php');
//require_once('/../../yii/framework/test/CDbTestCase.php');
$config=dirname(__FILE__).'/../../protected/models/Cv.php';
//$config=dirname(__FILE__).'/var/www/pvt14/Group1/protected/models¨/Cv.php';
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
     $newCv =new CV();
        // test to ensure that the object from an fsockopen is valid
       //$cv = new Cv();
        $this->assertTrue($newCv->tableName()=="Cv");

    }
    public function testBeforeSave(){
        $newCv = new CV();
        $this->assertTrue($newCv->beforeSave() == true);
    }
    public function testsCvSave(){
        $Cv = new CV(
        );
        $this->assertFalse($Cv->save());

        $newCv = new Cv;
        $newCv->typeOfEmployment='consult';
        $newCv->geographicAreaId=135;
        $newCv->title ='testTitel';
        //$newCv->publisherId=1;
    //    $newCv->validate();

        $this->assertTrue($newCv->validate());
     }

    public function testAttributeLabels(){
        $newCv = new CV();
        $array=$newCv->attributeLabels();
        $this->assertTrue($array !== null);
        $this->assertTrue($array['publisherId'] == 'Publisher');
    }
}
?>