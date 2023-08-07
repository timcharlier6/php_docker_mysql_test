<?php

declare(strict_types=1);


class Beverage {
    protected $color;
    protected $price;
    protected $temperature;
    
    public function __construct($color, $price, $temperature) {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    public function getInfo() {
     /*    echo "This beverage is {$this->temperature} and {$this->color}\n" */;
    }
}

class Beer extends Beverage {
    private $name;
    private $alcoholPercentage;

    public function __construct($color, $price, $temperature, $name, $alcoholPercentage){
        parent::__construct($color, $price, $temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }

    public function getName() {
        return $this->name;
    }

    public function getAlcoholPercentage() {
        return $this->alcoholPercentage;
    }

    public function getInfo() {
        parent::getInfo();
        echo "Hi i'm {$this->getName()} and have an alcochol percentage of {$this->getAlcoholPercentage()} and I have a {$this->color} color.";
    }
}

$duvel = new Beer("light", 2.00, "cold", "Duvel", "8°");
$duvel->getInfo();

/* EXERCISE 4

Copy the code of exercise 3 to here and delete everything related to cola.

TODO: Make all properties protected.
TODO: Make all the other prints work without error without changing the beverage class.
TODO: Don't call getters in de child class.

USE TYPEHINTING EVERYWHERE!
*/