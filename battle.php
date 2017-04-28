<?php
session_start();
require_once 'ReadyInfo.php';
require_once 'Game.php';

$ready_file = '.ReadyInfo';
$ready_info = unserialize(file_get_contents($ready_file));
if($ready_info->is_ready() && !isset($_SESSION['active'])){
  $_SESSION['game_id'] = $ready_info->current_game();
  $ready_info->advance_games();
  $game = unserialize(file_get_contents('.game_'.$_SESSION['game_id']));

  echo "AVAILABLE\r\n";
  $us_first = rand(0, 1);
  echo 'ROLL:'.$us_first."\r\n";
  $hash = hash('md5', $_SERVER['REMOTE_ADDR'].$_SERVER['REQUEST_TIME'].$_SERVER['REQUEST_TIME']);
  echo 'SESSION:'.$hash."\r\n";

  $game->turn = $us_first;

  // Only stuff being called by opponent needs hash
  $_SESSION['hash'] = $hash;

  file_put_contents($ready_file, serialize($ready_info));
  file_put_contents('.game_'.$_SESSION['game_id'], serialize($game));
  $_SESSION['active'] = true;
} else
  echo "UNAVAILABLE\r\n";
?>
