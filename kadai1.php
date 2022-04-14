<?php

  require_once "classes/Ferrari.php";
  require_once "classes/Honda.php";
  require_once "classes/Nissan.php";

  $ferrari = new Ferrari();
  $honda = new Honda();
  $nissan = new Nissan();

  function printCarInfo(...$car){
    foreach($car as $car){
      echo "メーカー：{$car->name}";
      echo "\n";
      echo "定員数：{$car->member_capacity}";
      echo "\n";
      echo "価格：{$car->price}";
      echo "\n";
      echo "加速度：{$car->acceleration}";
      echo "\n";
      echo "減速度：{$car->deceleration}";
      echo "\n";
      echo "最高速度：{$car->max_velocity}";
      echo "\n";
      echo "車高：{$car->height}";
      echo "\n";
      echo "\n";

    }
  }

  printCarInfo($ferrari,$honda,$nissan);

?>