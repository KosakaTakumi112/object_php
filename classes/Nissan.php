<?php

  require_once "car.php";

  class Nissan extends Car{

    function __construct(
      $name = "日産",
      $price = 15000000,
      $member_capacity = 5, 
      $member = 1,
      $velocity = 0,
      $max_velocity = 140,
      $acceleration = 30 * 0.6,
      $deceleration = 40,
      $height = 150,
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