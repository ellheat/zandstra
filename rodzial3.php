<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8" />
</head>
<body>

<?php

class ShopProduct {
	
	private $title;
	private $producerFirstName;
	private $producerMainName;
	protected $price;
	private $publicationDate;
	private $discount = 0;
	
	public function __construct($title, $firstName, $mainName, $price, $publicationDate) {
		$this->title = $title;
		$this->producerFirstName = $firstName;
		$this->producerMainName = $mainName;
		$this->price = $price;
		$this->publicationDate = $publicationDate;
	}
	
	public function getProducer(){
		return $this->producerFirstName.' '. $this->producerMainName;
	}
		
	public function setDiscount($num){
		$this->discount = $num;
	}
	
	public function getPrice(){
		return ($this->price - $this->discount);
	}
	
	public function getPublicationDate(){
		return $this->publicationDate;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function getSummaryLine(){
		$base = $this->title.' ('.$this->publicationDate.') - '.$this->getProducer();
		return $base;
	}
}

class CdProduct extends ShopProduct {
	
	private $playLength = 0;	
		
	public function __construct($title, $firstName, $mainName, $price, $publicationDate, $playLenght){
		parent::__construct($title, $firstName, $mainName, $price, $publicationDate);
		$this->playLength = $playLenght;		
	}
	
	public function getPlayLength(){
		return $this->playLength;
	}
	
	public function getSummaryLine(){
		$base = parent::getSummaryLine();
		$base .= ': play length - '.$this->playLength;
		return $base;
	}
}

class BookProduct extends ShopProduct {
		
	private $numPages = 0;	
		
	public function __construct($title, $firstName, $mainName, $price, $publicationDate, $numPages){
		parent::__construct($title, $firstName, $mainName, $price, $publicationDate);
		$this->numPages = $numPages;
	}	
		
	public function getNumberOfPages(){
		return $this->numPages;
	}
	
	public function getSummaryLine(){
		$base = parent::getSummaryLine();
		$base .= ': number of pages - '.$this->numPages;
		return $base;
	}
}

class ShopProductWriter {
	
	private $products = array();
	
	public function addProduct(ShopProduct $shopProduct){
		$this->products[] = $shopProduct;
	}
	
	public function write(ShopProduct $shopProduct){
		$str = '';
		foreach ($this->products as $shopProduct) {
			$str .= $shopProduct->getTitle().' - ';
			$str .= $shopProduct->getProducer().' - ';
			$str .= $shopProduct->getPublicationDate().' - ';
			$str .= $shopProduct->getPrice().'$';
		}
		print $str.'<br>';
	}
}


$book1 = new ShopProduct('Silmarillion', 'J.R.R.', 'Tolkien', '59.99', '15 September 1977', '365', null);
$book2 = new ShopProduct('The Fellowship of the Ring', 'J.R.R.', 'Tolkien', '49.99', '29 July 1954', '445', null);
$music1 = new ShopProduct('Dangerous', 'Michael', 'Jackson', '39.99', '26 November 1991', null, '77:00');

$writer = new ShopProductWriter();
$writer->addProduct($music1);
$writer->write($music1);

?>
	
</body>
</html>

