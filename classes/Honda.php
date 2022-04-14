<?php

  require_once "car.php";

  class Honda extends Car{

    function __construct(
      $name = "ホンダ",
      $price = 25000000,
      $member_capacity = 4, 
      $member = 1,
      $velocity = 0,
      $max_velocity = 160,
      $acceleration = 30,
      $deceleration = 40,
      $height = 50,
    ){
      parent::__construct(
        $name,
        $price,
        $member_capacity,
        $member,$velocity,
        $max_velocity,
        $acceleration,
        $deceleration,
        $height
      );
    }
 
  }

?>