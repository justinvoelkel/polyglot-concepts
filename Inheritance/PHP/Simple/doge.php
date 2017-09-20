<?php

require_once("./doggo.php");

Class Doge extends Doggo
{
	// The Doge class has these more specific properties that define it
	protected $talent;
	protected $attitude;

	public function __construct()
	{
		// Doge specific property
		$this->talent = "Does Memes";
		$this->attitude = "Sassy but fun";
	}

	/**
	 *  We can override base methods from the parent
	 *  to get different results
	 * 
	 *  @return void
	 */
	public function speak()
	{
		echo "Much Woof! Such Loud...".PHP_EOL;
	}

}

// Maisey is just a typical doggo
$maisey = new Doggo("Collie Mix", "Pretty Brown");
// Base speak method
$maisey->speak();
echo "I am a {$maisey->breed} that is {$maisey->color}".PHP_EOL;

// Shibe is a very particular doggo
$shibe = new Doge("Shibe", "Very Tan");
// Overridden speak method
$shibe->speak();
echo "Henlo, I am a {$shibe->breed} that is {$shibe->color} and my talent is {$shibe->talent} and my attitude is {$shibe->attitude}".PHP_EOL;
