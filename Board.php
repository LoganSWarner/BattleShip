<?php
require_once 'Position.php';

class Board{
  private $grid;
  private $width;
  private $height;

  public function __construct($width, $height){
    $this->grid = array_fill(0, $height,
                             array_fill(0, $width, '-'));
    $this->width = $width;
    $this->height = $height;
  }

  public function mark_position($position, $info){
    $this->grid[$position->x][$this->numeric_y($position->y)] = $info;
  }

  public function position_on_board($position){
    $numeric_y = $this->numeric_y($position->y);
    $in_area = $position->x >= 0 && $position->x < $this->width;
    $in_area = $in_area && $numeric_y >= 0 && $numeric_y < $this->height;
    return $in_area;
  }

  public function numeric_y($y){
    return ord($y) - 65;
  }

  public function get_grid(){
    return $this->grid;
  }

  public function build_display(){
    $display = '<div class="grid-item"></div>';
    for($i = 0; $i < $this->width; $i++){
      $display .= '<div class="grid-item">' . $i .'</div>';
    }
    foreach($this->grid as $y => $row){
      $row_letter = chr($y + 65);
      $display .= '<div class="grid-item">' . $row_letter . '</div>';
      foreach($row as $x => $record){
        $display .= '<div class="grid-item" data-x="' .
                    $x . '" data-y="' .
                    $y . '">' . substr($record, 0, 1) .'</div>';
      }
    }
    return $display;
  }
}
?>
