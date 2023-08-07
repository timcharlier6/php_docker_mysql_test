<?php

declare(strict_types=1);

class Beverage {
    private $color;
    private $price;
    private $temperature;
    private $barName;
   
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

$duvel = new Beer("blond", 2.00, "cold", "Het huis", "Duvel", "8°");
$duvel->getInfo();

echo "<p>\n Constant Beverage bar name: " . $cola->getBarName() . "\n </p>";
echo "<p>\n Constant Beer bar name: " . $duvel->getBarName() . "\n </p>";

/* EXERCISE 6

Copy the classes of exercise 2.

TODO: Change the properties to private.
TODO: Make a const barname with the value 'Het Vervolg'.
TODO: Print the constant on the screen.
TODO: Create a function in beverage and use the constant.
TODO: Do the same in the beer class.
TODO: Print the output of these functions on the screen.
TODO: Make sure that every print is on a new line.

Use typehinting everywhere!
*/