<?php

  require_once "car.php";

  class Ferrari extends Car{

    protected bool $isLiftUp = false;

    function __construct(
      $name = "フェラーリ",
      $price = 35000000,
      $member_capacity = 1, 
      $member = 1,
      $velocity = 0,
      $max_velocity = 300,
      $acceleration = 60,
      $deceleration = 50,
      $height = 120,
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

    function getHeight(){
      return $this->height;
    }

    function liftChange(){
      if(!$this->isLiftUp){
        $this->height += 4;
        $this->acceleration *= 0.8;
      } else {
        $this->height -= 4;
        $this->acceleration /= 0.8;
      }
      $this->isLiftUp = !($this->isLiftUp);
    }

  }

?>