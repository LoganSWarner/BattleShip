<?php
require_once 'BattleArena.php';
require_once 'Board.php';

class Game{
  public $our_arena;
  public $enemy_board;
  // 0 for enemy, 1 for us
  public $turn;

  public function __construct(){
    $this->our_arena = new BattleArena(10, 10);
    $this->enemy_board = new Board(10, 10);
  }
}
?>
