<?php

//parent class
class Vehicle
{
    protected string $make;
    protected int $year;
    
    public function __construct($make, $year)
    {
        $this->make = $make;
        $this->year = $year;
    }
}

class Car extends Vehicle
{
    protected int $topSpeed;

    public function __construct($make, $year, $topSpeed)
    {
        parent::__construct($make, $year);

        $this->topSpeed = $topSpeed;
    }

    public function showCar()
    {
        echo "This car is manufactured by $this->make in Year $this->year. <br>It has a top speed of $this->topSpeed";
    }



}

