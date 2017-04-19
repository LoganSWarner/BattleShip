<?php
require 'BattleArena.php';
session_start();
$arena = $_SESSION['arena'];
$coords = $_POST['COORDS'];
$x = substr($coords, 0, 1);
$y = substr($coords, 1);
echo $arena->hit(new Position($x, $y));
?>
