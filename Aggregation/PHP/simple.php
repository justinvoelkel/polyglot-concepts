<?php

Class Animal
{
    private $vertibrate;
    private $phylum;
    private $sex;

    public function __set($property, $value):void
    {
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
    }

    public function __get($property):mixed
    {
        if(property_exists($this, $property)){
            return $this->$property;
        }
    }
}

Class Quadraped
{
    protected $legs = 4;
}

Class Biped
{
    protected $legs = 2;
}

Class Doggo
{
    private $taxonomy;
    private $legs;
    private $breed;
    private $color;
    private $age;
    private $texture = "fuzzy";
    private $ears = "floppy";

    public function __construct(Animal $taxonomy, Quadraped $legs)
    {
        $this->taxonomy = $taxonomy;
        $this->legs = $legs;
    }

    public function __set($property, $value)
    {
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
    }

    public function __get($property)
    {
        if(property_exists($this, $property)){
            return $this->$property;
        }
        return $this;
    }
}

Class Maisey
{
    protected $parent;
    protected $attitude = "sassy";
    protected $status = "diva";

    public function __construct(Doggo $doggo)
    {
        $this->parent = $doggo;
        $this->parent->breed = "Collie Mix";
        $this->parent->color = "Tan";
        $this->parent->taxonomy->sex = "Female";
    }
}

Class Justin
{
    private $taxonomy;
    private $legs;
    private $attitude = "Whiney";
    private $status = "shy";

    public function __construct(Animal $taxonomy, Biped $legs)
    {
        $this->taxonomy = $taxonomy;
        $this->legs = $legs;
        $this->taxonomy->sex = "Male";
    }
}
// set up an instance of animal to be aggregated into different implementations
$animal = new Animal();
// set some properties that we know about
$animal->vertibrate = true;
$animal->phylum = "canis";
// Maisey needs a doggo class for implementation - Doggo requires a quadraped class to be instantiated
$doggo = new Doggo($animal, new Quadraped());
$maisey = new Maisey($doggo);
// Change the original animal implementation to a human phylum
$animal->phylum = "chordata";
// Instantiate Justin with the updated animal instance and a biped instantiation
// Notice the flexibility and side stepping of single inheritance limitation
$justin = new Justin($animal, new Biped());

var_dump($maisey, $justin);