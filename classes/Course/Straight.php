<?php
  require_once "road.php";

  class Straight extends Road {

    public $distance_km_ = 50;
    public $tolerance_velocity_kmph_ = 300;

    function __construct(){
    }

  }

?>