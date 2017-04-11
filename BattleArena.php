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
      $this->ship_positions = [];
    }

    public function place_ship($position, $ship, $direction){
      for($i = 0; $i < $ship->get_length(); $i++){
        if($this->has_ship_at($position))
          return false;
        $planned_positions[$i] = clone $position;
        if($direction === Direction::RIGHT)
          $position->x++;
        else
          $position->y++;
      }
      $this->mark_ship_coordinates($planned_positions, $ship);
      return true;
    }

    private function mark_ship_coordinates($positions, $ship){
      for($i = 0; $i < sizeof($positions); $i++){
        $this->ship_positions[(string) $positions[$i]] = $ship;
      }
    }

    public function has_ship_at($position){
      return isset($this->ship_positions[(string) $position]);
    }
  }
?>
