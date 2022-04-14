<?php

  require_once "car.php";

  class Nissan extends Car{
    public $name = "日産";
    public $price = 15000000;
    public $member_capacity = 4;
    public $member = 1;
    public $velocity = 0;
    public $max_velocity = 140;
    public $acceleration = 30;
    public $deceleration = 40;
    public $height = 150;

    function __construct(){
      $this->price = mt_rand(($this->price - 9999999), ($this->price + 10000000));
    }


  }

?>