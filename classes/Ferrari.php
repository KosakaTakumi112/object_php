<?php

  require_once "car.php";

  class Ferrari extends Car{

    public $name = "フェラーリ";
    public $price = 35000000;
    public $member_capacity = 1 ;
    public $member = 1;
    public $velocity = 0;
    public $max_velocity = 300;
    public $acceleration = 60;
    public $deceleration = 50;
    public $height = 120;
    public $isLiftUp = false;

    function __construct(){
      $this->price = mt_rand(($this->price - 9999999), ($this->price + 10000000));
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