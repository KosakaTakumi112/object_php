<?php

  require_once "classes/Course/course.php";
  require_once "classes/Cars/Ferrari.php";
  require_once "classes/Cars/Honda.php";
  require_once "classes/Cars/Nissan.php";
  require_once "classes/Cars/Toyota.php";
  require_once "classes/Calc/Calc.php";


  //表示をゆっくりにするメソッド。$hasSleepをtrueにすると表示がゆっくりされる。他のクラスに切り分けるなどが必要。
  function cSleep($int){
    $hasSleep = true;
    if($hasSleep){
      sleep($int);
    }
  }

  //コース作成
  $course_instance = new Course();
  $course = $course_instance->getCourse();
  $total_km = $course_instance->getTotalKm();

  $car_names = ["Ferrari","Honda","Nissan","Toyota"];
  $car_objects = [];

  // $info_while_racing = [ "車の名前" => [["距離" => "km"],["途中表示地点" => "km"],["前回時いたコースタイプ" => 0] ...]] ]
  $info_while_racing = [];

  //前回いたコースタイプを記録し,0か1でフラグを立てる配列。例)日産が直線にいた時 $mark = [ "nissan" => ["Straight" => 1 , "Curve" => 0 ....]];
  $mark = [];

  foreach($car_names as $car_name){
    $car_objects += array($car_name => (new $car_name));
    $info_while_racing += array($car_name => ["distance" => 0, "information_point" => 100]);
    $mark += array($car_name => ["Straight"=>0 ,"Curve"=>0,"BeforeCurve"=>0,"Crash"=>0 ]);
  }

  echo "本日のレースに参加する車を紹介します。\n";
  cSleep(2);
  foreach($car_objects as $car_name => $car_object){
    echo $car_name . "ー！\n";
    cSleep(1);
    echo "最高速度は" . Calc::toKmph($car_object->max_velocity_mps_) . "(km/h)\n";
    cSleep(1);
    echo "加速度は" . $car_object->acceleration_mpss_ . "(m/s^2)\n";
    cSleep(1);
    echo "減速度は" . $car_object->deceleration_mpss_ . "(m/s^2)\n";
    cSleep(2);
  }

  echo "まもなくレースを開始します。開始位置に並んでくささい。\n";
  cSleep(2);

  echo "レースの総距離は" . $total_km . "kmです。\n";
  cSleep(2);
  echo "それではレースを開始します。\n";
  cSleep(2);
  echo "位置について";
  cSleep(1);
  echo "よーい";
  cSleep(1);
  echo "どん！\n";

  cSleep(1);
  echo "--------------すべての車は一斉に走り出した--------------\n";
  cSleep(1);

  $delta_time = 1;
  $race_time = 0;

  //ゴールした車はranking配列に代入される。
  $ranking = [];
  while(!(count($ranking) == count($car_objects))){

    $race_time += $delta_time;

    if ($race_time % 60 == 0){
      echo Calc::toHMS($race_time). "経過\n";
      usleep(200000);
    }
    
    foreach($car_names as $car_name){

      //車のインスタンスを変数に入れとく
      $car = $car_objects[$car_name];

      $velocity_mps = $car->getVelocityMps();
      $acceleration_mpss = $car->getAccelerationMpss();

      //delta_time毎の走行距離を計算し、kmに直してから配列に蓄積
      $info_while_racing[$car_name]["distance"] += Calc::toKm($velocity_mps * $delta_time + 0.5 * $acceleration_mpss * $delta_time * $delta_time);

      $current_location_km = $info_while_racing[$car_name]["distance"];

      //現在までの走行距離がお知らせする距離を超えていたら表示
      if($current_location_km > $info_while_racing[$car_name]["information_point"]){
        echo "--------------" . $car_name . "は" . $info_while_racing[$car_name]["information_point"] ."km突破した！" . "(" . Calc::toHMS($race_time)  .")--------------\n";
        $info_while_racing[$car_name]["information_point"] += 100;
        cSleep(2);
      }

      //今いる道のオブジェクトを取得
      $current_road = $course_instance->getRoad($current_location_km);
      //今いる道のタイプを取得
      $current_road_type = $current_road["road_type"];
      //今いる道の許容速度を取得
      $current_road_tolerance_velocity = $current_road["tolerance_velocity_mps"];

      //今走っている道のタイプによって速度の更新、カーブであればクラッシュ判定を行う。
      switch($current_road_type){

        case "Straight":
          $car->pushAccel($delta_time);

          //ここは後ほど改善必要
          $mark[$car_name]["Straight"] = 1;
          $mark[$car_name]["Curve"] = 0;
          $mark[$car_name]["BeforeCurve"] = 0;
          $mark[$car_name]["Crash"] = 0;
          break;

        case "BeforeCurve":

          //前回いたコースタイプがBeforeCurve出ない時のみ表示する)
          if ($mark[$car_name]["BeforeCurve"] == 0){
            echo $car_name . "がカーブに突入するぞ！ブレーキをふみこめー！\n";
            $mark[$car_name]["BeforeCurve"] = 1;
          }
          if($race_time % 1 == 0){
            echo "現在速度:" . Calc::toKmph($car->velocity_mps_). "(km/h)\n" ;
            cSleep(1);
          }
          $car->pushBreak($delta_time);
          break;

        case "Curve":
          if ($mark[$car_name]["Curve"] == 0){
            echo $car_name . "はカーブを曲がる！\n";
            cSleep(1);
            echo "現在速度:" . Calc::toKmph($car->velocity_mps_) . "(km/h)\n" . "許容速度" . $current_road_tolerance_velocity ."(km/h)\n" ;
            cSleep(1);
            $mark[$car_name]["Curve"] = 1;

            if(Calc::toKmph($car->velocity_mps_) > $current_road_tolerance_velocity){
              echo "クラッシュしたーーーーーーーーーーーーーーーー！\n";
              cSleep(2);
              $car->velocity_mps_ = 5;
              echo "速度が10km/hにダウン！\n";
              cSleep(2);
              echo "さらに車が故障して性能が大幅に下がった！\n";
              cSleep(1);

              //ここはクラッシュ時に最高速度と加速度を低下させている。マジックナンバーがあるため改善要。
              $car->max_velocity_mps_ = rand(35,45);
              $car->acceleration_mpss_ = rand(6,9);
              echo "最高速度は" . Calc::toKmph($car->max_velocity_mps_) . "(km/h)に!\n";
              cSleep(1);
              echo "加速度は" . $car->acceleration_mpss_ . "(m/s^2)に!\n";
              $mark[$car_name]["Crash"] = 1;
              cSleep(2);
            }
          }

          if($mark[$car_name]["Crash"] == 1){
            $car->pushAccel($delta_time);
          }
          break;
      }
      // echo $car_name . "の速度は" . $car->getVelocityMps() . "\n";

      //ゴール判定
      if($info_while_racing[$car_name]["distance"] > $total_km){
        echo "--------------" . $car_name . "がゴールしました！--------------\n";
        $ranking += array($car_name => $race_time);
        $index = array_search($car_name,$car_names);
        unset($car_names[$index]);
      }
    }

  }

  echo "結果発表\n";
  cSleep(1);

  $i = 0;
  foreach ($ranking as $car_name => $goal_time){
    echo "第". $i+1 . "位:\n";
    cSleep(2);
    echo $car_name . "で" . Calc::toHMS($goal_time) ."\n" ;
    cSleep(2);
    $i++;
  }

?>