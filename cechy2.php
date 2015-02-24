<?php

interface IdentityObject {
	public function generateId();
}

trait IdentityTrait {
	public function generateId() {
		return uniqid();
	}
}

trait PriceUtilities {
	private $taxrate = 17;
	
	function calculateTax($price) {
		return (($this->taxrate/100) * $price);
	}
}

class ShopProduct implements IdentityObject {
	use PriceUtilities, IdentityTrait;
}

function storeIdentityObject(IdentityObject $idobj) {
	
}

$p = new ShopProduct();
print $p->calculateTax(100).'<br>';
print $p->generateId().'<br>';

storeIdentityObject($p);
?>