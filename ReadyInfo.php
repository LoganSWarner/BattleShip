<?php
class ReadyInfo{
  private $ready;
  private $next_game_num;

  public function __construct(){
    $this->ready = true;
    $this->next_game_num = 0;
  }

  public function get_next_game_num(){
    $this->ready = false;
    return $this->next_game_num++;
  }

  public function ready(){
    $this->ready = true;
  }
}
?>
