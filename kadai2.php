<?php

  require_once "classes/Cars/Ferrari.php";

  $ferrari = new Ferrari();

  echo "リフトアップ前の車高:".$ferrari->getHeight()."(cm)\n";
  echo "リフトアップ前の加速度:".$ferrari->getAcceleration()."(m/s^2)\n\n";
  $ferrari->liftChange();

  echo "リフトアップ後の車高:".$ferrari->getHeight()."(cm)\n";
  echo "リフトアップ後の加速度:".$ferrari->getAcceleration()."(m/s^2)\n\n";
  $ferrari->liftChange();

  echo "リフトダウン後の車高:".$ferrari->getHeight()."(cm)\n";
  echo "リフトダウン後の加速度:".$ferrari->getAcceleration()."(m/s^2)\n\n";

?>