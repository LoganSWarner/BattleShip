<?php

class ArenaController{
  private $arena;

  public function __construct($is_new){
    if($is_new)
      $this->arena = new BattleArena(10, 10);
    else
      $this->load_arena();
  }

  public function hit($x, $y){
    return $this->arena->hit(new Position($x, $y));
  }

  public function get_hit_record_grid(){
    return $this->arena->get_hit_record_grid();
  }

  public function tear_down(){
    $this->store_arena();
  }

  private function load_arena(){
    $filename = session_id() . ".bs";
    $this->arena = unserialize(file_get_contents($filename));
  }

  private function store_arena(){
    $filename = session_id() . ".bs";
    file_put_contents($filename, serialize($this->arena));
  }
}

?>
