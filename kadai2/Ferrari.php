<?php

  require_once "car.php";

  class Ferrari extends Car{

    public $name = "フェラーリ";
    public $price = "35000000";
    public $member_capacity = 1 ;
    public $member = 1;
    public $velocity = 0;
    public $max_velocity = 300;
    public $acceleration = 60;
    public $deceleration = 50;
    public $height = 120;
    public $isLiftUp = false;


    function liftChange(){
      if($isLiftUp){
        echo "リフトダウンします。\n";
        echo "リフト前の車高{$this->height}\n";
        echo "リフト前の速度{$this->acceleration}\n";

        $this->height += 4;
        $this->acceleration *= 0.8;
        echo "リフト後の車高{$this->height}\n";
        echo "リフト後の速度{$this->acceleration}\n";
      } else {
        echo "リフトアップします。\n";
        echo "リフト前の車高{$this->height}\n";
        echo "リフト前の速度{$this->acceleration}\n";

        $this->height -= 4;
        $this->acceleration /= 0.8;
        echo "リフト後の車高{$this->height}\n";
        echo "リフト後の速度{$this->acceleration}\n";
      }
    }

  }

?>