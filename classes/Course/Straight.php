<?php
  require_once "road.php";

  class Straight extends Road {

    public $distance_km_ = 30;
    public $tolerance_velocity_mps_ = 300;

    function __construct(){
    }

  }

?>