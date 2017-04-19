<html>
  <head>

  </head>
  <body>
    <?php
    require_once 'ReadyInfo.php';
    $filename = '.ReadyInfo';
    if(file_exists($filename))
      $ready_info = unserialize(file_get_contents($filename));
    else
      $ready_info = new ReadyInfo();
    file_put_contents($filename, serialize($ready_info));
    ?>
  </body>
</html>
