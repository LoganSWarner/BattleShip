<?php
class Position{
  public $x;
  public $y;
  
  public function __construct($x, $y){
    $this->x = $x;
    $this->y = $y;
  }

  public function __tostring(){
    try{
      return (string)$this->x . ',' . (string)$this->y;
    }catch(Exception $exception){
      return 'ERROR';
    }
  }
}
?>
