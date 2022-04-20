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

  print_r($course);

  foreach($course as $c){
    echo $c["road_type"];
  }


  //車のインスタンスと走行距離の配列をそれぞれ作成
  $car_makers = ["Ferrari","Honda","Nissan","Toyota"];
  $cars = [];
  $distances = [];
  $information_point = [];
  $mark = [];

  foreach($car_makers as $car_maker){
    $cars += array($car_maker => (new $car_maker));
    $distances += array($car_maker => 0);
    $information_point += array($car_maker => 100);
    $mark += array($car_maker => "Straight");
  }


  //レースを行う。時間の計測感覚はdelta_timeで行う。
  echo "レースの総距離は" . Calc::toKm($total_m) . "kmです。\n";
  sleep(2);
  echo "位置について";
  sleep(1);
  echo "よーい";
  sleep(1);
  echo "どん！\n";

  sleep(1);
  echo "--------------すべての車は一斉に走り出した--------------\n";
  sleep(1);

  $delta_time = 1;
  $race_time = 0;
  $ranking = [];

  while(count($ranking) < count($cars)){

    $race_time += $delta_time;

    if ($race_time % 60 == 0){
      echo Calc::toHMS($race_time). "経過\n";
      usleep(200000);
    }

    foreach($car_makers as $car_maker){

      //車のインスタンス
      $car = $cars[$car_maker];

      //計算する単位を統一
      $velocity_mps = Calc::toMps($car->getVelocityKmph());
      $acceleration_mpss = $car->getAccelerationMpss();

      //加速度から進んだ距離を計算し、配列に蓄積
      $distances[$car_maker] += $velocity_mps * $delta_time + 0.5 * $acceleration_mpss * $delta_time * $delta_time;
      $current_location_km = Calc::toKm($distances[$car_maker]);
      if($current_location_km > $information_point[$car_maker]){
        echo "--------------" . $car_maker . "は" . $information_point[$car_maker] ."km突破した！" . "(" . Calc::toHMS($race_time)  .")--------------\n";
        $information_point[$car_maker] += 100;
        sleep(2);
      }

      //今いる道のタイプを取得
      $current_road = $course_instance->getRoad($current_location_km);
      $current_road_type = $current_road["road_type"];
      $current_road_tolerance_velocity = $current_road["tolerance_velocity_kmph"];
      // echo $current_road_type . "で" . $current_location_km . "地点にいます\n";


      //道のタイプによって速度の更新
      switch($current_road_type){

        case "Straight":
          $car->pushAccel($delta_time);
          $mark[$car_maker] = "Straight";
          break;

        case "Curve":
          if ($mark[$car_maker] != "Curve"){
            echo $car_maker . "はカーブを曲がる！\n";
            sleep(1);
            echo "現在速度:" . $car->velocity_kmph_ . "'km/h)\n" . "許容速度" . $current_road_tolerance_velocity ."(km/h)\n" ;
            sleep(1);
            $mark[$car_maker] = "Curve";
          }

          if($car->velocity_kmph_ > $current_road_tolerance_velocity && $mark[$car_maker] != "Crash"){
              echo "クラッシュしたーーーーーーーーーーーーーーーー！\n";
              sleep(2);
              $car->velocity_kmph_ = 10;
              echo "速度が10km/hにダウン！\n";
              sleep(2);
              $mark[$car_maker] = "Crash";
          }
          
          if($mark[$car_maker] == "Crash"){
            $car->pushAccel($delta_time);
          }

          break;

        default:
          if ($mark[$car_maker] != "BeforeCurve"){
            echo $car_maker . "がカーブに突入するぞ！ブレーキをふみこめー！\n";
            $mark[$car_maker] = "BeforeCurve";
          }
          if($race_time % 1 == 0){
            echo "現在速度:" . $car->velocity_kmph_ . "(km/h)\n" ;
            sleep(1);
          }
          $random = mt_rand(1,10) * 0.1;
          $car->pushBreak($delta_time * $random);
      }
      // echo $car_maker . "の速度は" . $car->getVelocityKmph() . "\n";


      //ゴール判定
      if($distances[$car_maker] > $total_m){
        echo "--------------" . $car_maker . "がゴールしました！--------------";
        $ranking += array($car_maker => $race_time);
        $index = array_search($car_maker,$car_makers);
        unset($car_makers[$index]);
        print_r($car_makers);
      }
    }

  }

  echo "結果発表\n";
  sleep(1);

  $i = 0;
  foreach ($ranking as $car_maker => $goal_time){
    echo "第". $i+1 . "位:" . $car_maker . "で" . Calc::toHMS($goal_time) ."\n" ;
    $i++;
  }


?>