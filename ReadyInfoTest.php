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

  public function testInitiallyReady(){
    $this->assertTrue($this->ready_info->is_ready());
  }

  public function testNextGame(){
    $this->assertEquals(0, $this->ready_info->next_game());
    $this->assertEquals(false, $this->ready_info->next_game());
  }
}
