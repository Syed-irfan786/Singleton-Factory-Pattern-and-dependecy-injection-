<?php


abstract class Animal {
    protected $name;
    protected $color;
    
    public function __construct($name, $color) {
      $this->name = $name;
      $this->color = $color;
    }
    
    abstract public function makeSound();
    
    public function getName() {
      return $this->name;
    }
    
    public function getColor() {
      return $this->color;
    }
  }
  
class Dog extends Animal {
    public function makeSound() {
      return "Woof <br>";
    }
  }
  
class Cat extends Animal {
    public function makeSound() {
      return "Meow";
    }
  }

 
  
  $dog = new Dog("WhiteDog", "white");
  $cat = new Cat("BlackCat", "black");

echo $dog->getName()." makes = ". $dog->makeSound();
echo $cat->getName()." makes = " .$cat->makeSound();
  
  
  