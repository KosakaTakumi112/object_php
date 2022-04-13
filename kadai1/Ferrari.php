<?php

  require_once "car.php";

  class Ferrari extends Car{

    public $name = "フェラーリ";
    public $price = "35000000";
    public $member_capacity = 1 ;
    public $member = 1;
    public $velocity = 0;
    public $max_velocity = 300;
    public $acceleration = 60;
    public $deceleration = 50;
    public $height = 120;

  }

?>