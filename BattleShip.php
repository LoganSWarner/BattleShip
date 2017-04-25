<!doctype html>

<html>
  <head>
    <script src='BattleShipClient.js'></script>
    <link rel='stylesheet' href='BattleShip.css'/>
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
    <div class="side-by-side">
      <div id="our_board" class="battle-grid">
        <?php
        require_once 'Board.php';
        $board = new Board(10, 10);
        echo $board->build_display();
        ?>
      </div>
      <div id="enemy_board" class="battle-grid">
        <?php
        $board = new Board(10, 10);
        echo $board->build_display();
        ?>
      </div>
    </div>
  </body>
</html>
