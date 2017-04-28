<?php
class ReadyInfo{
  private $ready;
  private $game_num;

  public function __construct(){
    $this->ready = false;
    $this->game_num = 0;
  }

  public function current_game(){
    return $this->game_num;
  }

  public function advance_games(){
    $this->game_num++;
    $this->ready = false;
  }

  public function is_ready(){
    return $this->ready;
  }

  public function ready(){
    $this->ready = true;
  }
}
?>
