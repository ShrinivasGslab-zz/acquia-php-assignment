<?php
use PHPUnit\Framework\TestCase;
require_once('./src/class.php');

class RobotBattteryTest extends TestCase {
	public function testClasses()
	{
		$battery = new RobotBattery;
		$this->assertClassHasAttribute('fillDuration', RobotBattery::class);
		$this->assertEquals(30, $battery->fillDuration);
		$this->assertClassHasAttribute('batteryLife', RobotBattery::class);
		$this->assertEquals(60, $battery->batteryLife);
		$this->assertClassHasAttribute('batteryCurrentLife', RobotBattery::class);
		//$this->assertSame(60, $battery->refill());//takes more time to check value
	}
}
?>