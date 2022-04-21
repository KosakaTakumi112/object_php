<?php

  require_once "car.php";

  class Toyota extends Car{

    function __construct(
      $name = "トヨタ",
      $price_jpy         = 20000000,
      $seating_capacity  = 4,
      $seating_number    = 1,
      $velocity_mps     = 0,
      $max_velocity_mps = 56,
      $acceleration_mpss = 9,
      $deceleration_mpss = -15,
      $height_cm = 130,
    ){
      parent::__construct(
        $name,
        $price_jpy,
        $seating_capacity,
        $seating_number,
        $velocity_mps,
        $max_velocity_mps,
        $acceleration_mpss = round($price_jpy/1000000),
        $deceleration_mpss,
        $height_cm
      );

    }

  }

?>