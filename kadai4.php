<?php

  require_once "classes/Ferrari.php";
  require_once "classes/Honda.php";
  require_once "classes/Nissan.php";

  //echoの連続になってしまうため関数でまとめた。carクラスに入れるのも検討したが、今回は実行ファイルに書いた。
  //後2つくらい同じようなメソッドが出たら、これらを切り出して別のクラスなどを作ろうかと思う。
  function printSeatingNumberAndAcceleration($object){
    echo "現在".$object->getSeatingNumber()."人乗車中\n";
    echo "この時の加速度は".$object->getAcceleration()."(m/s^2)\n";
  }

  $nissan = new Honda();

  echo "この車の定員数は".$nissan->getSeatingCapacity()."人です。\n";

  printSeatingNumberAndAcceleration($nissan);
  $nissan->getOn(3);

  printSeatingNumberAndAcceleration($nissan);
  $nissan->getOn(1);

  printSeatingNumberAndAcceleration($nissan);
  $nissan->getOff(1);

?>