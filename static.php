<?php

class StaticExample {
	static public $aNum = 0;
	static public function sayHello() {
		self::$aNum++;
		print "Hej ".self::$aNum."<br>";
	}
}

StaticExample::sayHello();
StaticExample::sayHello();
StaticExample::sayHello();
StaticExample::sayHello();

?>