<?php
trait PriceUtilities {
	function calculateTax($price){
		return (($this->taxrate/100) * $price);
	}
	abstract function getTaxRate();
}

abstract class Service {
	
}

class UtilityService extends Service {
	use PriceUtilities;
	
	function getTaxRate() {
		return 17;
	}
}

$u = new UtilityService();
print $u->calculateTax(100).'<br>';

?>
