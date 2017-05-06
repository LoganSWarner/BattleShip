<?php
require_once 'battleship_client_teller.php';
require_once 'Game.php';
session_start();
if(isset($_SESSION['game_id'])){
  $game = unserialize(file_get_contents('.game_'.$_SESSION['game_id']));
  $x = substr($_GET['COORDS'], 0, 1);
  $y = substr($_GET['COORDS'], 1);
  $ship = new Ship($_GET['SHIP_LENGTH'], $_GET['SHIP_NAME']);
  $direction = (int)$_GET['DIRECTION'];
  $game->our_arena->place_ship(new Position($x, $y), $ship, $direction);
  file_put_contents('.game_'.$_SESSION['game_id'], serialize($game));
  echo $game->our_arena->get_board()->build_display();
}
?>
