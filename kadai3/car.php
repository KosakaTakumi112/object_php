<?php

  class Car{

    private $name;
    private $price;
    private $member_capacity;
    private $member;
    private $velocity;
    private $max_velocity;
    private $acceleration;
    private $deceleration;
    private $height;
    
    function accel($time){
      $this->velocity += $this->acceleration * $time ;
      //これは継承されたクラスで呼び出される時,$this→nameは継承先のクラスの属性を指す。
    }

    function break($time){
      $this->velocity += $this->deceleration * $time;
    }

    function getOn($member){
      $this->member += $member;
    }

    function getOff($member){
      if ($member < $this->member){
        $this->member -= $member;
      } else {
        echo "そんなに人は乗っていません。";
      }
    }

  }

?>