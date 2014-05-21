<?php

require_once('../../protected/models/Hotlist.php');

class HotlistTest extends PHPUnit_Framework_TestCase
{
  public function setUp(){ }
  public function tearDown(){ }

  public function testSaveCvId()
  {
    // test to ensure that the object from an fsockopen is valid
    $hotlistObj = new Hotlist();
    $hotlist->cvID = "Testing hotlist";
    $this->assertTrue($hotlist->save());
	
  }
}
?>