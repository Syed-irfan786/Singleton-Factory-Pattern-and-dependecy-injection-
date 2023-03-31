
<?php

//Two ways to acheive dependency injection in PHP
class Car
{
    public $engine ;
    public function __construct($engine){
        $this->engine = $engine ;
    }
}

//using interface
interface MiddleMan{
    public function middle(Car $a);
}

class Suzuki implements MiddleMan{
    public $car ;
    public function middle(Car $a){
        $this->car = $a;
    }
    public function getEngine(){
        return $this->car ;
    }
}


//using Constructor
class Volvo{
    public $engine;

    public function __construct(Car $a)
    {
        $this->engine = $a ;
    }

    public function getEngine(){
        return $this->engine ;
    }


}


//using interface
$car  = new Car("1500 CC");
$suzuki = new Suzuki;
$suzuki->middle($car);
var_dump($suzuki->getEngine()); //object(Car)#1 (1) { ["engine"]=> string(7) "1500 CC" }


//using Constructor
$car1 = new Car("2000 CC Engine");
$volvo = new Volvo($car1);
var_dump($volvo->getEngine());  //object(Car)#3 (1) { ["engine"]=> string(14) "2000 CC Engine" }