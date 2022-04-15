<?php

  require_once "classes/Cars/Ferrari.php";
  require_once "classes/Cars/Honda.php";
  require_once "classes/Cars/Nissan.php";

  $classNames = ["Nissan","Honda","Ferrari"];

  foreach($classNames as $className){
    $objects = [];
    $random_number = mt_rand(10,100);

    for ($i = 0; $i < $random_number; $i++){
      $objects[] = new $className();
    };

    Car::printAvgAndSumPrice($objects);
  };

?>