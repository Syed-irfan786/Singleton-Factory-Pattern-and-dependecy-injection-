<?php

class Employee{
    private $name ;
    private $contact ;
    private $salary ;
    private $address ;

    public function __construct($name , $contact, $salary , $address){
        $this->name = $name;
        $this->contact = $contact;
        $this->salary = $salary;
        $this->address = $address;

    }

    public function getDetails(){
        return $this->name .' '.$this->contact.' '.$this->salary .' '.$this->address;
    }
}

class Factory{

    public static function createEmployeeObject($name , $contact, $salary , $address){
        return new Employee($name , $contact, $salary , $address);
    }
}


// $obj = new Employee("irfan", "00000","10k" ,"xyz");
// echo $obj->getDetails();

// $obj1 =  new Employee("irfan", "00000000","10k" ,"xyz");
$emp = Factory::createEmployeeObject("irfann", "00000000","10k" ,"xyz");
echo  $emp->getDetails();