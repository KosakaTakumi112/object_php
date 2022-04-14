<?php

  class Car{

    protected string $name;
    protected int $price;
    protected int $member_capacity;
    protected int $member;
    protected float $velocity;
    protected float $max_velocity;
    protected float $acceleration;
    protected float $deceleration;
    protected int $height;

    function __construct(
      $name,
      $price,
      $member_capacity,
      $member,
      $velocity,
      $max_velocity,
      $acceleration,
      $deceleration,
      $height
      ){
      $this->name = $name;
      $this->price = mt_rand(($price - 9999999), ($price + 10000000));
      $this->member_capacity = $member_capacity;
      $this->member = $member;
      $this->velocity = $velocity;
      $this->max_velocity = $max_velocity;
      $this->acceleration = $acceleration;
      $this->deceleration = $deceleration;
      $this->height = $height;
    }

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
        echo "定員数を超えているため乗ることができません。";
        return;
      }

      $this->member += $member;
      for ($i = 0; $i<$member; $i++){
        $this->acceleration = $this->acceleration*(0.95);
      }
      echo "追加で" . $member . "人乗車しました。\n";

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
      if ($member == $this->member){
        echo "全員降りちゃダメだよ";
        return;
      }

      $this->member -= $member;
      for ($i = 0; $i<$member; $i++){
        $this->acceleration = $this->acceleration/(0.95);
      }
      echo $member . "人降りました。\n";

    }

    function getPrice(){
      return $this->price;
    }

    function getMember(){
      return $this->member;
    }

    function getMemberCapacity(){
      return $this->member_capacity;
    }

    function getAcceleration(){
      return $this->acceleration;
    }

    function printCarInfo(){
        echo "\n";
        echo "メーカー名：{$this->name}";
        echo "\n";
        echo "定員数：{$this->member_capacity}人";
        echo "\n";
        echo "価格：{$this->price}円";
        echo "\n";
        echo "加速度：{$this->acceleration}(km/s^2)";
        echo "\n";
        echo "減速度：{$this->deceleration}(km/s^2)";
        echo "\n";
        echo "最高速度：{$this->max_velocity}(km/s)";
        echo "\n";
        echo "車高：{$this->height}(cm)";
        echo "\n";
        echo "\n";
    }

  }

?>