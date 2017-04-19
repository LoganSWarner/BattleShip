<?php
session_start();
require 'BattleArena.php';

if(!isset($_SESSION['Started'])) {
  $arena = new BattleArena(10, 10);
  $_SESSION['arena'] = $arena;

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
