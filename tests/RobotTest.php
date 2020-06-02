<?php
use PHPUnit\Framework\TestCase;
require_once('./class.php');

class RobotTest extends TestCase {
    public function setUp()
	{
		$robot = new Robot();
	}

	public function testClasses()
	{
		$this->cleanArea($floortype, $area);
	}

	public function tearDown()
	{
		// Clean up
	}
}


?>