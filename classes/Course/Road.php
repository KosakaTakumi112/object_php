<?php

abstract class Road {

  public $distance_km_;
  public $tolerance_velocity_kmph_;

  function __construct(){
  }

  function getDistanceKm(){
    return $this->distance_km_;
  }

}

?>