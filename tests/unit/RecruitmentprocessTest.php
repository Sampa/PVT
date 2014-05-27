<?php
//require_once('/../../yii/framework/yii.php');
//require_once('Cv.php');
//require_once('/../../yii/framework/test/CDbTestCase.php');
$config=dirname(__FILE__).'/../../protected/models/Recruitmentprocess.php';
//$config=dirname(__FILE__).'/var/www/pvt14/Group1/protected/models¨/Cv.php';
Yii::createWebApplication($config);

class RecruitmentprocessTest extends PHPUnit_Framework_TestCase
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
     $newRecprocess =new Recruitmentprocess();
        // test to ensure that the object from an fsockopen is valid
       //$cv = new Cv();
        $this->assertTrue($newRecprocess->tableName()=="RecruitmentProcess");

    }
  
    public function testCreateProcess(){
      
        $Recruitmentprocess = new Recruitmentprocess(
        );
        $this->assertFalse($Recruitmentprocess->save());

        $newRecprocess = new Recruitmentprocess;
        $newRecprocess->typeOfEmployment='consult';
     //   $newRecprocess->geographicAreaId=135;
        $newRecprocess->title ='testRekrytering';
        $newRecprocess->recruiterId=54;
    //    $newCv->validate();

        $this->assertTrue($newRecprocess->validate());
     }

    public function testAttributeLabels(){
        $newRecprocess = new Recruitmentprocess();
        $array=$newRecprocess->attributeLabels();
        $this->assertTrue($array !== null);
        $this->assertTrue($array['recruiterId'] == 'recruiter');
    }
}
?>