<?php

  require_once "classes/Course/course.php";
  require_once "classes/Cars/Ferrari.php";
  require_once "classes/Cars/Honda.php";
  require_once "classes/Cars/Nissan.php";
  require_once "classes/Cars/Toyota.php";
  require_once "classes/Calc/Calc.php";

  //コース作成
  $course_instance = new Course();
  $course = $course_instance->getCourse();
  $total_m = Calc::toM($course_instance->getTotalKm());
  echo "レースの総距離は" . Calc::toKm($total_m) . "kmです。\n";
  sleep(1);

  //車と走行距離の配列をそれぞれ作成
  $car_makers = ["Ferrari","Honda","Nissan","Toyota"];
  $cars = [];
  $distances = [];
  $ranking = [];

  foreach($car_makers as $car_maker){
    $cars += array($car_maker => (new $car_maker));
    $distances += array($car_maker => 0);
  }

  // print_r($cars);
  // print_r($distances);

  $delta_time = 60;
  $race_time = 0;
  while(count($car_makers) != 0){

    $race_time += $delta_time;
    if (($race_time % 60) == 0){

      // sleep(1);
      echo Calc::toHMS($race_time). "経過\n";
      foreach($car_makers as $car_maker){
        //計算する単位を統一
        $velocity_mps = Calc::toMps($cars[$car_maker]->getVelocityKmph());
        $acceleration_mpss = $cars[$car_maker]->getAccelerationMpss();
  
        //進んだ距離を計算し、配列に蓄積
        $distances[$car_maker] += $velocity_mps * $delta_time + 0.5 * $acceleration_mpss * $delta_time * $delta_time;
        // echo Calc::toHMS($race_time) . "秒時点で" . $car_maker . "は" . Calc::toKm($distances[$car_maker]) . "km進んでいます。\n";
        echo $car_maker . "の速度は" . $cars[$car_maker]->getVelocityKmph() . "\n";
  
        //速度の更新
        $cars[$car_maker]->pushAccel($delta_time);
    
        if($distances[$car_maker] > $total_m){
          echo $car_maker . "がゴールしました！";
          $ranking += array($car_maker => $race_time);
          $index = array_search($car_maker,$car_makers);
          unset($car_makers[$index]);
          print_r($car_makers);
          break;
        }
      }

    }
  }

  echo "結果発表\n";
  sleep(1);


  $i = 0;
  foreach ($ranking as $car_maker => $goal_time){
    echo "第". $i+1 . "位:" . $car_maker . "で" . $goal_time ."秒\n" ;
    $i++;
  }

  //やることは、車を走らせる0.1秒ごとに、その車はメーカーごとにループさせる
  //車の走行距離を保持する配列を用意する。



?>