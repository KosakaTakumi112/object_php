<?php

  require_once "car.php";

  class Nissan extends Car{

    function __construct(
      $name = "日産",
      $price_jpy         = 15000000,
      $seating_capacity  = 4,
      $seating_number    = 1,
      $velocity_mps     = 0,
      $max_velocity_mps = 50,
      $acceleration_mpss = 9,
      $deceleration_mpss = -8,
      $height_cm = 130,
    ){
      parent::__construct(
        $name,
        $price_jpy,
        $seating_capacity,
        $seating_number,
        $velocity_mps,
        $max_velocity_mps,
        $acceleration_mpss * 0.6,
        $deceleration_mpss,
        $height_cm
      );

    }

  }

?>