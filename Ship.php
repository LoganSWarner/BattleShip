<?php
  class Ship{
    private $length;
    private $sunk;
    private $num_hits;
    private $name;

    function __construct($length, $name){
      $length = $length;
      $sunk = false;
      $num_hits = 0;
      $name = $name;
    }

    public function hit(){
      $num_hit += 1;
      if($num_hits == $length){
        $sunk = true;
      }
    }

    public function get_length(){
      return $length;
    }

    public function is_sunk(){
      return $sunk;
    }
  }
?>
