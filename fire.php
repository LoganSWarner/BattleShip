<?php
require_once 'Game.php';
require_once 'BattleArena.php';
session_start();
if($_POST['hash'] === $_SESSION['hash']){
  $game = unserialize(file_get_contents('.game_'.$_SESSION['game_id']));
  $coords = $_POST['COORDS'];
  $x = substr($coords, 0, 1);
  $y = substr($coords, 1);
  echo $game->our_arena->hit(new Position($x, $y));
  file_put_contents('.game_'.$_SESSION['game_id'], serialize($game));
}
?>
