<?php

  require_once "Ferrari.php";

  $ferrari = new Ferrari();

  echo "リフトアップ前の車高{$ferrari->height}\n";
  echo "リフトアップ前の加速度{$ferrari->acceleration}\n";
  $ferrari->liftChange();

  echo "リフトアップ後の車高{$ferrari->height}\n";
  echo "リフトアップ後の加速度{$ferrari->acceleration}\n";
  $ferrari->liftChange();

  echo "リフトダウン後の車高{$ferrari->height}\n";
  echo "リフトダウン後の車高{$ferrari->acceleration}\n";

?>