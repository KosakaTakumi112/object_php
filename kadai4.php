<?php

  require_once "classes/Ferrari.php";
  require_once "classes/Honda.php";
  require_once "classes/Nissan.php";

  $nissan = new Nissan();

  echo "{$nissan->member}人乗車中\n";
  echo "{$nissan->member_capacity}";
  echo "この時の加速度は{$nissan->acceleration}\n";
  $nissan->getOn(3);
  echo "{$nissan->member}人乗車中\n";
  echo "この時の加速度は{$nissan->acceleration}\n";

?>