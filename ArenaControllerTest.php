<?php

require 'Position.php';
require 'Ship.php';
require 'Direction.php';
require 'BattleArena.php';
require 'ArenaController.php';
use PHPUnit\Framework\TestCase;

final class ArenaControllerTests extends TestCase{
  private $arenaController;

  public function setUp(){
    $this->arenaController = new ArenaController(true);
  }

  public function tearDown(){
    $this->arenaController = NULL;
  }

  public function testHit(){
    $this->assertEquals("MISS", $this->arenaController->hit(5, 'A'));
  }

  public function testStore(){
    $this->arenaController->tear_down();
    $this->assertFileExists(session_id().'.bs');
  }

  public function testLoad(){
    $this->arenaController->hit(5, 'A');
    $this->arenaController->tear_down();
    $this->arenaController = new ArenaController(false);
    $this->assertEquals("MISS", $this->arenaController->get_hit_record_grid()[5][0]);
  }
}
