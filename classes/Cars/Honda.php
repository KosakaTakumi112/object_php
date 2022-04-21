<?php

  require_once "car.php";

  class Honda extends Car{

    function __construct(
      $name              = "ホンダ",
      $price_jpy         = 25000000,
      $seating_capacity  = 5,
      $seating_number    = 1,
      $velocity_mps     = 0,
      $max_velocity_mps = 45,
      $acceleration_mpss = 8,
      $deceleration_mpss = -8,
      $height_cm = 150,
    ){
      parent::__construct(
        $name,
        $price_jpy,
        $seating_capacity,
        $seating_number,
        $velocity_mps,
        $max_velocity_mps,
        $acceleration_mpss,
        $deceleration_mpss,
        $height_cm
      );

    }

  }

?>