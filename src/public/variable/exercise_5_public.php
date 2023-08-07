<?php

declare(strict_types=1);

class Beverage {
    private $color;
    private $price;
    private $temperature;

    public function __construct($color, $price, $temperature) {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    protected function getPrice() {
        return $this->price;
    }
    
    public function getInfo() {

    }    
}

class Beer extends Beverage {
    private $name;
    private $alcoholPercentage;

    public function __construct($color, $temperature, $name, $alcoholPercentage){
        parent::__construct($color, 2.34, $temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage; 
    }

    public function getInfo() {
        parent::getInfo();
        echo "Hi, I'm {$this->name} and have an alcohol percentage of {$this->alcoholPercentage} and I have a {$this->color} color.\n";
        echo "Price: {$this->getPrice()} euro.\n";
    }
}

$duvel = new Beer('light', 'cold', 'Duvel', '9°');
$duvel->getInfo();


/* EXERCISE 5

Copy the class of exercise 1.

TODO: Change the properties to private.
TODO: Fix the errors without using getter and setter functions.
TODO: Change the price to 3.5 euro and print it also on the screen on a new line.
*/