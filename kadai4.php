<?php

  require_once "classes/Ferrari.php";
  require_once "classes/Honda.php";
  require_once "classes/Nissan.php";

  $nissan = new Nissan();

  echo "この車の定員数は".$nissan->getMemberCapacity()."人です。\n";
  echo "現在".$nissan->getMember()."人乗車中\n";
  echo "この時の加速度は".$nissan->getAcceleration()."(km/s^2)\n";

  $nissan->getOn(3);
  echo "現在".$nissan->getMember()."人乗車中\n";
  echo "この時の加速度は".$nissan->getAcceleration()."(km/s^2)\n";

  $nissan->getOn(1);
  echo "現在".$nissan->getMember()."人乗車中\n";
  echo "この時の加速度は".$nissan->getAcceleration()."(km/s^2)\n";

  $nissan->getOff(1);
  echo "現在".$nissan->getMember()."人乗車中\n";
  echo "この時の加速度は".$nissan->getAcceleration()."(km/s^2)\n";

?>