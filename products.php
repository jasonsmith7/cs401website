<?php

class Products{
	public $name;
	public $price;
	public $quantity;
	
	publilc function __construct($name, $price = 0.0, $quantity){
		$this->name = $name;
		$this->price = $price;
		$this->quantity = $quantity;
	}
}
		
	