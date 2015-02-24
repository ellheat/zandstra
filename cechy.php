<?php

trait PriceUtilities {
	private $taxrate = 17;
	
	function calculateTax($price) {
		return (($this->taxrate/100) * $price);
	}
}

class ShopProduct {
	use PriceUtilities;
}

abstract class Service {
	use PriceUtilities;
}

class UtilityService extends Service {
	use PriceUtilities;
}

$p = new ShopProduct();
print $p->calculateTax(100).'<br>';

$u = new UtilityService();
print $u->calculateTax(100).'<br>';

?>