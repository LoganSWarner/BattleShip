<?php
session_start();
require_once 'ReadyInfo.php';
require_once 'Board.php';
require_once 'BattleArena.php';

$filename = '.ReadyInfo'
$ready_info = unserialize(file_get_contents($filename));
if($ready_info->ready && !isset($_SESSION['Started'])) {
  $_SESSION['game'] = $ready_info->get_next_game_num();
  file_put_contents($filename, serialize($ready_info));
  $_SESSION['our_arena'] = new BattleArena(10, 10);
  $_SESSION['opponent_board'] = new Board(10, 10);

  echo "AVAILABLE\r\n";
  $us_first = rand(0, 1);
  $_SESSION['us_first'] = $us_first;
  echo 'ROLL:'.$us_first."\r\n";
  $hash = hash('md5', $_SERVER['REMOTE_ADDR'].$_SERVER['REQUEST_TIME'].$_SERVER['REQUEST_TIME']);
  echo 'SESSION:'.$hash."\r\n";
  $_SESSION['Started'] = True;
} else
  echo "UNAVAILABLE\r\n";
?>
