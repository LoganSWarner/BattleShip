<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

function notify($type, $message){
  echo 'event: '.$type.PHP_EOL;
  echo 'data: '.$message.PHP_EOL;

  ob_flush();
  flush();
}
?>
