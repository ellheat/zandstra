<?php
trait PriceUtilities {
	function calculateTax($price){
		return (($this->taxrate/100) * $price);
	}
}

abstract class Service {
	
}

class UtilityService extends Service {
	public $taxrate = 17;
	use PriceUtilities;
}

$u = new UtilityService();
print $u->calculateTax(100).'<br>';

?>
