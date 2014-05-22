<?php

require_once('../../protected/models/Cv.php');

class CvTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }

    public function testTableName()
    {
        // test to ensure that the object from an fsockopen is valid
       $cv = new Cv();
        $this->assertTrue($cv->tableName());

    }
}
?>