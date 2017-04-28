<?php
require 'BattleArena.php';
session_start();
if($_POST['hash'] === $_SESSION['hash']){
  $arena = $_SESSION['our_arena'];
  $coords = $_POST['COORDS'];
  $x = substr($coords, 0, 1);
  $y = substr($coords, 1);
  echo $arena->hit(new Position($x, $y));
}
?>
