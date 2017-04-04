<?php
  class Ship{
    private $length;
    private $sunk;
    private $num_hits;
    private $name;

    public Ship($length, $name){
      $length = $length;
      $sunk = false;
      $num_hits = 0;
      $name = $name;
    }

    public hit(){
      $num_hit += 1;
      if($num_hits == $length){
        $sunk = true;
      }
    }

    public get_length(){
      return $length;
    }

    public is_sunk(){
      return $sunk;
    }
  }
?>
