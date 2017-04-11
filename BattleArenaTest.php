<?php

require 'Position.php';
require 'Ship.php';
require 'Direction.php';
require 'BattleArena.php';
use PHPUnit\Framework\TestCase;

final class BattleArenaTests extends TestCase{
  private $arena;
  private $carrier;

  protected function setUp(){
    $this->arena = new BattleArena(10, 10);
  }

  protected function tearDown(){
    $this->arena = NULL;
  }

  public function testPlaceCarrier(){
    $this->arena->place_ship(new Position(1, 'A'),
                             new Ship(5, "Carrier"),
                             Direction::DOWN);
    $this->assertTrue($this->arena->has_ship_at(new Position(1, 'A')));
    $this->assertTrue($this->arena->has_ship_at(new Position(1, 'B')));
    $this->assertTrue($this->arena->has_ship_at(new Position(1, 'C')));
    $this->assertTrue($this->arena->has_ship_at(new Position(1, 'D')));
    $this->assertTrue($this->arena->has_ship_at(new Position(1, 'E')));
  }

  public function testPlacementNoOverlap(){
    $this->arena->place_ship(new Position(2, 'A'),
                             new Ship(5, "Carrier"),
                             Direction::DOWN);
    $this->arena->place_ship(new Position(1, 'B'),
                             new Ship(2, "Patrol Boat"),
                             Direction::RIGHT);
    $this->assertFalse($this->arena->has_ship_at(new Position(1, 'B')));
  }

}
