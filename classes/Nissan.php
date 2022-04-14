<?php

  require_once "car.php";

  class Nissan extends Car{

    function __construct(
      $name = "日産",
      $price = 15000000,
      $member_capacity = 4, 
      $member = 1,
      $velocity = 0,
      $max_velocity = 180,
      $acceleration = 9,
      $deceleration = 12,
      $height = 130,
    ){
      parent::__construct(
        $name,
        $price,
        $member_capacity,
        $member,$velocity,
        $max_velocity,
        $acceleration * 0.6,
        $deceleration,
        $height
      );
    }

  }

?>