<?php

  class Calc {

    function __construct(){
    }

    static function toMPS($kmph){
      return $kmph * 1000 / 3600;
    }

    static function toM($km){
      return $km * 1000;
    }

    static function toKm($m){
      return round($m / 1000,1);
    }

    static function toHMS($seconds) {
      $hours = floor($seconds / 3600);
      $minutes = floor(floor($seconds / 60) % 60);
      $seconds = $seconds % 60;
      if ($hours == 0){ 
        $hms = sprintf("%02d" ."分"."%02d". "秒", $minutes, $seconds); 
        return $hms;
      }
      $hms = sprintf("%02d". "時間"."%02d" ."分"."%02d". "秒", $hours, $minutes, $seconds); 
      return $hms;
    }

  }

?>