<?php
  require_once "road.php";


  class Curve extends Road {

    public $distance_km_ = 1;
    public $tolerance_velocity_kmph_ = 130;

    function __construct(){
    }

  }

?>