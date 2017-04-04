<?php

require 'Ship.php';
use PHPUnit\Framework\TestCase;

final class ShipTests extends TestCase{
  private $patrol_boat;
  private $cruiser;
  private $submarine;
  private $battleship;
  private $carrier;

  protected function setUp(){
    $this->patrol_boat = new Ship(2, "Patrol boat");
    $this->cruiser = new Ship(3, "Cruiser");
    $this->submarine = new Ship(3, "Submarine");
    $this->battleship = new Ship(4, "Battleship");
    $this->carrier = new Ship(5, "Carrier");
  }

  protected function tearDown(){
    $this->patrol_boat = NULL;
    $this->cruiser = NULL;
    $this->submarine = NULL;
    $this->battleship = NULL;
    $this->carrier = NULL;
  }

  public function testLength(){
    $this->assertEquals($this->battleship->get_length(), 4);
  }

  public function testSink(){
    for($i=0; $i<5; $i++){
      $this->assertFalse($this->carrier->is_sunk());
      $this->carrier->hit();
    }
    $this->assertTrue($this->carrier->is_sunk());
  }
}
