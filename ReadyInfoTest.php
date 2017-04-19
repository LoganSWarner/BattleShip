<?php

require 'ReadyInfo.php';
use PHPUnit\Framework\TestCase;

final class ReadyInfoTests extends TestCase{
  private $ready_info;

  protected function setUp(){
    $this->ready_info = new ReadyInfo();
  }

  protected function tearDown(){
    $this->ready_info = NULL;
  }

  public function testNotYetReady(){
    $this->assertFalse($this->ready_info->ready);
  }

  public function testGetNextGameNum(){
    $this->assertEquals(0, $this->ready_info->get_next_game_num());
    $this->assertEquals(1, $this->ready_info->get_next_game_num());
  }
}
