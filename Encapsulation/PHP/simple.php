<?php

Class Doggo
{
	private $name = "Maisey";
	private $age = 1;
	private $breed = "Collie Mix";

	public function setProperty($property, $value)
	{
		if(property_exists($this, $property)){
			$this->$property = $value;
		}
	}

	public function getProperty($property)
	{
		if(property_exists($this, $property)){
			return $this->$property;
		}
	}
}

$doggo = new Doggo();

// properties of doggo cannot be read directly from the new object
// echo $doggo->name;

// nor written directly from the new object
// $doggo->name = "Borky Bork";

// the appropriate method(s) must be called to read or write
$doggo->setProperty("name", "Lord Woofington");
echo $doggo->getProperty("name");
