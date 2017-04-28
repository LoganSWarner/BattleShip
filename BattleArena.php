<?php

require_once 'Position.php';
require_once 'Board.php';
require_once 'Direction.php';
require_once 'Ship.php';

class BattleArena{
  private $board;
  private $ship_positions;

  public function __construct($width, $height){
    $this->board = new Board($width, $height);
    $this->ship_positions = [];
  }

  public function place_ship($position, $ship, $direction){
    for($i = 0; $i < $ship->get_length(); $i++){
      if(!$this->board->position_on_board($position))
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

  private function mark_ship_coordinates($positions, $ship){
    for($i = 0; $i < sizeof($positions); $i++){
      $this->ship_positions[(string) $positions[$i]] = $ship;
    }
  }

  public function has_ship_at($position){
    return isset($this->ship_positions[(string) $position]);
  }

  public function hit($position){
    if(!$this->board->position_on_board($position))
      return 'MISS';

    $hit_record = '';
    $ship = $this->get_ship_at($position);
    if($ship !== NULL){
      $ship->hit();
      $hit_record = strtoupper($ship->get_name());
    }else
      $hit_record = 'MISS';
    $this->board->mark_position($position, $hit_record);
    return $hit_record;
  }

  public function get_board(){
    return $this->board;
  }

  private function get_ship_at($position){
    if($this->has_ship_at($position))
      return $this->ship_positions[(string) $position];
    else
      return NULL;
  }
}
?>
