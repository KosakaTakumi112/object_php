<?php

  require_once "classes/Ferrari.php";
  require_once "classes/Honda.php";
  require_once "classes/Nissan.php";

  function printAvgAndSum($className){

    $prices = [];
    $random_number = mt_rand(10,100);

    for ($i = 0; $i < $random_number; $i++){
      $prices[] = new $className();
    };

    $sumPrice = array_sum(array_column($prices, "price"));
    $avgPrice = round($sumPrice / count($prices));
    echo "{$className}の合計金額は{$sumPrice}円\n";
    echo "{$className}の平均価格は{$avgPrice}円\n";

  }

  $classNames = ["Nissan","Honda","Ferrari"];

  foreach($classNames as $className){
    printAvgAndSum($className);
  };

?>