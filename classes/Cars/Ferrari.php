<?php

  require_once "car.php";

  class Ferrari extends Car{

    protected bool $isLiftUp_ = false;

    function __construct(
      $name              = "フェラーリ",
      $price_jpy         = 35000000,
      $seating_capacity  = 1,
      $seating_number    = 1,
      $velocity_mps     = 0,
      $max_velocity_mps = 75,
      $acceleration_mpss = 20,
      $deceleration_mpss = -13,
      $height_cm = 100,
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

    function liftChange(){
      if(!$this->isLiftUp_){
        $this->height_cm_ += 4;
        $this->acceleration_mpss_ *= 0.8;
      } else {
        $this->height_cm_ -= 4;
        $this->acceleration_mpss_ /= 0.8;
      }
      $this->isLiftUp_ = !($this->isLiftUp_);
    }

  }

?>