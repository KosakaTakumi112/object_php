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

      if($member <= 0){
        echo "正しい人数を指定してください";
        return;
      }
      if(($member + $this->member) > $this->member_capacity ){
        echo "{$this->member_capacity}\n";
        echo "定員数を超えているため乗ることができません。";
        return;
      }

      $this->member += $member;
      $this->acceleration = $this->acceleration*(0.95)^$member;

    }

    function getOff($member){

      if ($member <= 0){
        echo "正しい人数を指定してください";
        return;
      }
      if ($member > $this->member){
        echo "そんなに人は乗っていません。";
        return;
      }
      if ($member = $this->member){
        echo "全員降りちゃダメだよ";
        return;
      }

      $this->member -= $member;
      $this->acceleration = $this->acceleration/(0.95)^$member;

    }

  }

?>