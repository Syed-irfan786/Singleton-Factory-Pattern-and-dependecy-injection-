<?php


//Singleton will allow only one objected to be created and it does not allow to create more than one object of that particular class.
class singleton{
    private static $instance = null;
    function __construct(){
        echo "Connect";
    }

    public static function showInstance(){
        if(self::$instance==null){
            self::$instance= new static();
        }
        else{
            echo "<br> Already object created";
        }
        return self::$instance;
    }
}

$object= singleton::showInstance();
$object2= singleton::showInstance();

// var_dump ($object);