<?php
class ReadyInfo{
  private $ready;
  private $next_game_num;

  public function __construct(){
    $this->ready = true;
    $this->next_game_num = 0;
  }

  public function next_game(){
    if($this->ready){
      $this->ready = false;
      return $this->next_game_num++;
    }else
      return false;
  }

  public function is_ready(){
    return $this->ready;
  }

  public function ready(){
    $this->ready = true;
  }
}
?>
