<?php

  require_once "Straight.php";
  require_once "BeforeCurve.php";
  require_once "Curve.php";

  class Course {

    #$course = [["クラス名","許容速度","道の終端地点(km)"]]で表現する。
    public $course = [];

    function __construct(){
      $straight = new Straight();
      $this->course[] = [
        "road_type" => get_class($straight),
        "tolerance_velocity_mps" => $straight->tolerance_velocity_mps_,
        "terminate_road_km" => $straight->distance_km_,
      ];

      for($i = 0; $i < 2; $i++){
          for($j = 0; $j < mt_rand(2,4); $j++){
            $this->course[] = $this->getArrayCourseElement("Straight");
          }
          $this->course[] = $this->getArrayCourseElement("BeforeCurve");        
          $this->course[] = $this->getArrayCourseElement("Curve");
      }
    }

    function getCourse(){
      return $this->course;
    }
    function getTotalKm(){
      return end($this->course)["terminate_road_km"];
    }
    function getRoad($km){
      foreach($this->course as $road){

        if($km < $road["terminate_road_km"]){
          return $road;
        }
      }
      return end($this->course);
    }

    function getArrayCourseElement($class_name){
      $object = new $class_name();
      return [
        "road_type" => get_class($object),
        "tolerance_velocity_mps" => mt_rand($object->tolerance_velocity_mps_-20,$object->tolerance_velocity_mps_+10),
        "terminate_road_km" => end($this->course)["terminate_road_km"] + $object->distance_km_
      ];
    }

    //ランダム数ストレイトを回してその後カーブをつけるのをランダム数行う。

  }

?>