<?php

Class Doggo
{
	protected $breed;
	protected $color;

	public function __construct($breed, $color)
	{
		$this->breed = $breed;
		$this->color = $color;
	}

	/**
	 *  The traditional doggo speak method
	 *  
	 *  @return void
	 */
	public function speak()
	{
		echo "Woof Bork Borf!".PHP_EOL;
	}

	/**
	 *  Magic method getter for our properties
	 *  
	 *  @param  string $property 
	 *  @return string           
	 */
	public function __get($property)
	{
		if(property_exists($this, $property)){
			return $this->$property;
		}
	}

}
