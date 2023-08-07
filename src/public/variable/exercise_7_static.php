<?php

declare(strict_types=1);

class Beverage {
    private $color;
    private $price;
    private $temperature;
    private $barName;
    
    private static $address = "Melmarkt 9, 2000 Antwerpen";
   
    public function __construct(string $color, float $price, string $temperature, string $barName) {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
        $this->barName = $barName;
    }

    public function getColor(): string {
        return $this->color;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getTemperature(): string {
        return $this->temperature;
    }
    public function getBarName(): string {
        return $this->barName;
    }

    public static function getAddress(): string {
        return self::$address;
    }

    public function getInfo() {
        echo "<p> What beverage you can get at '{$this->barName}: a beverage {$this->temperature} and {$this->color} </p> \n";
    }
}

class Beer extends Beverage {
    private $name;
    private $alcoholPercentage;

    public function __construct(string $color, float $price, string $temperature, string $barName, string $name, string $alcoholPercentage){
        parent::__construct($color, $price, $temperature, $barName);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getAlcoholPercentage(): string{
        return $this->alcoholPercentage;
    }

    public function getInfo() {
        echo "\n<p> What beer you can get at {$this->getBarName()}: a beer {$this->getColor()} {$this->getName()} of {$this->getAlcoholPercentage()} and costs {$this->getPrice()} </p>";
    }
}



$cola = new Beverage("black", 2.00, "cold", "Het Huis");
$cola->getInfo();
echo "<p> 1. Static address : " . $cola->getAddress() . "</p>";
echo "<p> 2. Static address: " . Beverage::getAddress() . "</p>";

$duvel = new Beer("blond", 2.00, "cold", "Het huis", "Duvel", "8°");
$duvel->getInfo();

echo "<p>\n Constant Beverage bar name: " . $cola->getBarName() . "\n </p>";
echo "<p>\n Constant Beer bar name: " . $duvel->getBarName() . "\n </p>";

/* EXERCISE 7

Copy your solution from exercise 6

TODO: Make a static property in the Beverage class that can only be accessed from inside the class called address which has the value "Melkmarkt 9, 2000 Antwerpen".
TODO: Print the address without creating a new instant of the beverage class 2 times in two different ways.

Use typehinting everywhere!
*/