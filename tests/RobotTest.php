<?php
use PHPUnit\Framework\TestCase;
require_once('./src/class.php');

class RobotTest extends TestCase {
	public function testClasses()
	{
		$battery = new Robot;
		$this->assertClassHasAttribute('battery', Robot::class);
	}
}
?>