<?php

  require_once "classes/Ferrari.php";

  $ferrari = new Ferrari();

  echo "リフトアップ前の車高:".$ferrari->getHeight()."(cm)\n";
  echo "リフトアップ前の加速度:".$ferrari->getAcceleration()."(km/s^2)\n";
  $ferrari->liftChange();

  echo "リフトアップ後の車高:".$ferrari->getHeight()."(cm)\n";
  echo "リフトアップ後の加速度:".$ferrari->getAcceleration()."(km/s^2)\n";
  $ferrari->liftChange();

  echo "リフトダウン後の車高:".$ferrari->getHeight()."(cm)\n";
  echo "リフトダウン後の加速度:".$ferrari->getAcceleration()."(km/s^2)\n";

?>