<?php
  class BattleArena{
    private $width;
    private $height;
    private $hit_record_grid;
    private $ship_positions;

    public function __construct($width, $height){
      $this->width = $width;
      $this->height = $height;
      $this->hit_record_grid = array_fill(0, $height,
                                          array_fill(0, $width, "Unknown"));
      //TODO place ships
    }
  }
?>
