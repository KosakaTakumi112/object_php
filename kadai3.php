<?php

  require_once "classes/Ferrari.php";
  require_once "classes/Honda.php";
  require_once "classes/Nissan.php";

  $classNames = ["Nissan","Honda","Ferrari"];

  foreach($classNames as $className){
    $prices = [];
    $random_number = mt_rand(10,100);

    for ($i = 0; $i < $random_number; $i++){
      $objects[] = new $className();
    };

    Car::printAvgAndSumPrice($objects);
  };

?>