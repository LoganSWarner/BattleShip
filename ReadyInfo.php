<?php
class ReadyInfo{
  public $ready;
  private $next_game_num;

  public function __construct(){
    $this->ready = false;
    $next_game_num = 0;
  }

  public function get_next_game_num(){
    return $this->next_game_num++;
  }
}
?>
