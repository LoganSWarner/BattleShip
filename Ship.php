<?php
  class Ship{
    private $length;
    private $sunk;
    private $num_hits;
    private $name;

    function __construct($length, $name){
      $this->length = $length;
      $this->sunk = false;
      $this->num_hits = 0;
      $this->name = $name;
    }

    public function hit(){
      $this->num_hit += 1;
      if($this->num_hits == $this->length){
        $this->sunk = true;
      }
    }

    public function get_length(){
      return $this->length;
    }

    public function is_sunk(){
      return $this->sunk;
    }
  }
?>
