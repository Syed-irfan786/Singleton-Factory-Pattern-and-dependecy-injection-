<?php

//CallBack Function PHP Example
function calculate($num1, $num2,$callback) {

    if(is_callable($callback)){
        return "The result is = ". call_user_func($callback,$num1, $num2);
    }
    else{
         echo "The Parameter is not a call back function or the callback function not exist <br>" ;
    }
  }
  
  function sq($num1) {
    return $num1 * $num1;
  }
  function add($num1,$num2) {
    return $num1 + $num2;
  }
  function sub($num1,$num2) {
    return $num1 - $num2;
  }
  function mul($num1,$num2) {
    return $num1 * $num2;
  }
  function div($num1,$num2) {
    return $num1 / $num2;
  }
  function sqt($num1) {
    return sqrt($num1);
}
 
  
  $a = 22 ;
  $b = 22 ;
  echo calculate($a , $b ,'div');
  