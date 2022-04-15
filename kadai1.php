<?php

  require_once "classes/Cars/Ferrari.php";
  require_once "classes/Cars/Honda.php";
  require_once "classes/Cars/Nissan.php";

  $ferrari = new Ferrari();
  $ferrari->printCarInfo();
  $honda = new Honda();
  $honda->printCarInfo();
  $nissan = new Nissan();
  $nissan->printCarInfo();

?>