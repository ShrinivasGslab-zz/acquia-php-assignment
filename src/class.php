<?php
class RobotBattery
{
    public $batteryLife;
    public $fillDuration;
    public $batteryCurrentLife;

    public function __construct()
    {
        $this->batteryLife = 60;
        $this->fillDuration = 30;
        $this->batteryCurrentLife = $this->batteryLife;
    }
    public function refill()
    {
        $chargingtime = $this->fillDuration;
		while($chargingtime){
			sleep(1);
			$chargingtime -= 1;
			echo '[Time:'.date("H:i:s").'] [Battery will be Full in: '.$chargingtime.' sec]'.PHP_EOL; 		
		}
		$this->batteryCurrentLife = $this->batteryLife;
		return $this->batteryCurrentLife;
    }
}

class Apartment
{
    public $area;
    public function __construct($area)
    {
        $this->area = $area;
    }
    public function cleanArea($batteryobj)
    {
    	while($this->area){
			if($batteryobj->batteryCurrentLife==0){
				$curlife = $batteryobj->refill();
			}
			sleep($this->cleaningTime);
			$this->area -= 1;
			$batteryobj->batteryCurrentLife -= $this->cleaningTime;
			echo '[Time:'.date("H:i:s").'] [Area to clean: '.$this->area.' Square meter][Battery Remains for: '.$batteryobj->batteryCurrentLife.' sec]'.PHP_EOL; 
		}
    }
}

class HardfloorApartment extends Apartment {
	public $cleaningTime;
	public function __construct($area) {
	    parent::__construct($area);
	    $this->cleaningTime = 1;
	}
}

class CarpetfloorApartment extends Apartment {
	public $cleaningTime;
	public function __construct($area) {
		parent::__construct($area);
	    $this->cleaningTime = 2;
	}
}

class Robot{
	public $battery;
	public function __construct()
    {
        $this->battery = new RobotBattery();
    }
    public function cleanArea($floortype, $area): void
    { 
        if ($floortype=='carpet') {
			$cleanfloor = new CarpetfloorApartment($area);
		} elseif ($floortype=='hard') {
			$cleanfloor = new HardfloorApartment($area);
		} else {
			throw new InvalidArgumentException('Arguments are not valid.');
			//exit("not valid floor type");
		}
		echo 'Floor Type: '.$floortype.' , Given Area in Square Meter:'.$cleanfloor->area.PHP_EOL;
		$cleanfloor->cleanArea($this->battery);
    }
}
?>