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
	use PriceUtilities {
		PriceUtilities::calculateTax as private;
	}
	
	private $price;
	
	function __construct($price){
		return $this->price - $price;
	}
	function getTaxRate() {
		return 17;
	}
	function getFinalPrice() {
		return ($this->price + $this->calculateTax($this->price));
	} 
}

$u = new UtilityService(100);
print $u->getFinalPrice().'<br>';

?>
