<?php
require_once 'Game.php';
session_start();
if(isset($_SESSION['game_id'])){
  $game = unserialize(file_get_contents('.game_'.$_SESSION['game_id']));
  $x = substr($_POST['COORDS'], 0, 1);
  $y = substr($_POST['COORDS'], 1);
  $ship = new Ship($_POST['SHIP_NAME'], $_POST['SHIP_LENGTH']);
  $direction = $_POST['DIRECTION'];
  $game->our_arena->place_ship(new Position($x, $y), $ship, $direction);
}
?>
