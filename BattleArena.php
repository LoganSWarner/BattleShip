<?php

require 'Position.php';
require 'Direction.php';
require 'Ship.php';

class BattleArena{
  private $width;
  private $height;
  private $hit_record_grid;
  private $ship_positions;

  public function __construct($width, $height){
    $this->width = $width;
    $this->height = $height;
    $this->hit_record_grid = array_fill(0, $height,
                                        array_fill(0, $width, 'Unknown'));
    $this->ship_positions = [];
  }

  public function place_ship($position, $ship, $direction){
    for($i = 0; $i < $ship->get_length(); $i++){
      if(!$this->position_in_area($position))
        return false;
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

  private function position_in_area($position){
    $numeric_y = $this->numeric_y($position->y);
    $in_area = $position->x >= 0 && $position->x < $this->width;
    $in_area = $in_area && $numeric_y >= 0 && $numeric_y < $this->height;
    return $in_area;
  }

  private function mark_ship_coordinates($positions, $ship){
    for($i = 0; $i < sizeof($positions); $i++){
      $this->ship_positions[(string) $positions[$i]] = $ship;
    }
  }

  public function has_ship_at($position){
    return isset($this->ship_positions[(string) $position]);
  }

  public function hit($position){
    if(!$this->position_in_area($position))
      return 'MISS';

    $hit_record = '';
    $ship = $this->get_ship_at($position);
    if($ship !== NULL){
      $ship->hit();
      $hit_record = strtoupper($ship->get_name());
    }else
      $hit_record = 'MISS';
    $this->hit_record_grid[$position->x][$this->numeric_y($position->y)] =
      $hit_record;
    return $hit_record;
  }

  public function get_hit_record_grid(){
    return $this->hit_record_grid;
  }

  private function get_ship_at($position){
    if($this->has_ship_at($position))
      return $this->ship_positions[(string) $position];
    else
      return NULL;
  }

  private function numeric_y($y){
    return ord($y) - 65;
  }
}
?>
