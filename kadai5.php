<?php

  require_once "classes/Course/course.php";
  require_once "classes/Cars/Ferrari.php";
  require_once "classes/Cars/Honda.php";
  require_once "classes/Cars/Nissan.php";
  require_once "classes/Cars/Toyota.php";

  //コース作成
  $course = new Course();
  print_r($course->getCourse());

  //走らせる車作成
  $car_makers = ["Ferrari","Honda","Nissan","Toyota"];
  $cars = [];
  $distances = [];

  foreach($car_makers as $car_maker){
    $cars[] = new $car_maker;
    $distances[] = [$car_maker => 0];
  }

  print_r($cars);
  print_r($distances);

  //やることは、車を走らせる0.1秒ごとに、その車はメーカーごとにループさせる
  //車の走行距離を保持する配列を用意する。

?>