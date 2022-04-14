<?php

  require_once "classes/Ferrari.php";
  require_once "classes/Honda.php";
  require_once "classes/Nissan.php";

  $ferrari = new Ferrari();
  $ferrari->printCarInfo();
  $honda = new Honda();
  $honda->printCarInfo();
  $nissan = new Nissan();
  $nissan->printCarInfo();

?>