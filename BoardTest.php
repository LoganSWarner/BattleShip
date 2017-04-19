<?php

require_once 'Board.php';
use PHPUnit\Framework\TestCase;

final class BoardTests extends TestCase{
  private $board;

  protected function setUp(){
    $this->board = new Board(10, 10);
  }

  protected function tearDown(){
    $this->board = NULL;
  }

  public function testOnBoard(){
    $this->assertTrue($this->board->position_on_board(new Position(0, 'A')));
    $this->assertTrue($this->board->position_on_board(new Position(9, 'J')));
  }
}
?>
