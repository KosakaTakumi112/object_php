<?php

  abstract class Car{

    //命名方法
    //1.メンバ変数の末尾には_をつけている。
    //2.接尾辞にて単位情報を変数に付与してる。
    public string $name_;
    public    int $price_jpy_;
    public    int $seating_capacity_;
    public    int $seating_number_;
    public  float $velocity_kmph_;
    public  float $max_velocity_kmph_;
    public  float $acceleration_mpss_;
    public  float $deceleration_mpss_;
    public    int $height_cm_;

    static function printAvgAndSumPrice($object_array){
      if (count($object_array) == 0){ return; }
      if (empty(array_column($object_array,"price_jpy_"))){ return; }
      $class_name = get_class($object_array[0]);
      $sum_price = array_sum(array_column($object_array,"price_jpy_"));
      $avg_price = round($sum_price / count($object_array));
      echo "{$class_name}の合計金額は".number_format($sum_price)."円\n";
      echo "{$class_name}の平均価格は".number_format($avg_price)."円\n\n";
    }

    function __construct(
      $name,
      $price_jpy,
      $seating_capacity,
      $seating_number,
      $velocity_kmph,
      $max_velocity_kmph,
      $acceleration_mpss,
      $deceleration_mpss,
      $height_cm
      ){
      $this->name_              = $name;
      $this->price_jpy_         = mt_rand(($price_jpy - 9999999), ($price_jpy + 10000000));
      $this->seating_capacity_  = $seating_capacity;
      $this->seating_number_    = $seating_number;
      $this->velocity_kmph_     = $velocity_kmph;
      $this->max_velocity_kmph_ = $max_velocity_kmph;
      $this->acceleration_mpss_ = $acceleration_mpss;
      $this->deceleration_mpss_ = $deceleration_mpss;
      $this->height_cm_         = $height_cm;
    }

    //マジックメソッド
    public function   __get($prop) { return $this->$prop; }
    public function __isset($prop) : bool { return isset($this->$prop); }
    //ここまで

    //アクセサメソッド
    function            getPrice(){ return $this->price_jpy_; }
    function    getSeatingNumber(){ return $this->seating_number_; }
    function  getSeatingCapacity(){ return $this->seating_capacity_; }
    function     getVelocityKmph(){ return $this->velocity_kmph_; }
    function getAccelerationMpss(){ return $this->acceleration_mpss_; }
    function           getHeight(){ return $this->height_cm_; }
    //ここまで

    function pushAccel($time){
      $this->velocity_kmph_ += $this->acceleration_mpss_ * $time ;
      if($this->velocity_kmph_ > $this->max_velocity_kmph_ ){
        $this->velocity_kmph_ = $this->max_velocity_kmph_ ;
      }
    }

    function pushBreak($time){
      if ($this->velocity_kmph_ < 60){ return;}
      $this->velocity_kmph_ += $this->deceleration_mpss_ * $time * mt_rand(1,10) * 0.1;
      if($this->velocity_kmph_ < 60){
        $this->velocity_kmph_ = 60 ;
      }
    }

    function getOn($number){
      if($number <= 0){
        echo "1以上の人数を入力しましょう";
        return;
      }
      if($this->seating_capacity_  < ($number + $this->seating_number_)){
        echo "定員数を超えているため乗ることができません。";
        return;
      }

      $this->seating_number_ += $number;
      for ($i = 0; $i < $number; $i++){
        $this->acceleration_mpss_ = $this->acceleration_mpss_ * (0.95);
      }
      echo "追加で" . $number . "人乗車しました。\n";
    }

    function getOff($number){
      if ($number <= 0){
        echo "1以上の人数を入力しましょう";
        return;
      }
      if ($number > $this->seating_number_){
        echo "乗車中の人数を超えています。";
        return;
      }
      if ($number == $this->seating_number_){
        echo "全員降りちゃダメだよ";
        return;
      }

      $this->seating_number_ -= $number;
      for ($i = 0; $i<$number; $i++){
        $this->acceleration_mpss_ = $this->acceleration_mpss_/(0.95);
      }
      echo $number . "人降りました。\n";
    }

    function printCarInfo(){
        echo "\n";
        echo "メーカー名：{$this->name_}";
        echo "\n";
        echo "定員数：{$this->seating_capacity_}人";
        echo "\n";
        echo "価格：". number_format($this->price_jpy_) ."円";
        echo "\n";
        echo "加速度：{$this->acceleration_mpss_}(m/s^2)";
        echo "\n";
        echo "減速度：{$this->deceleration_mpss_}(m/s^2)";
        echo "\n";
        echo "最高速度：{$this->max_velocity_kmph_}(km/h)";
        echo "\n";
        echo "車高：{$this->height_cm_}(cm)";
        echo "\n";
        echo "\n";
    }

  }

?>