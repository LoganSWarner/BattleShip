<!doctype html>

<html>
  <head>
    <script src='BattleShipClient.js'></script>
    <link rel='stylesheet' href='BattleShip.css'/>
  </head>
  <body>
    <?php
    require_once 'ReadyInfo.php';
    require_once 'Game.php';
    require_once 'BattleArena.php';
    require_once 'Board.php';
    session_start();
    $ready_file = '.ReadyInfo';
    if(file_exists($filename))
      $ready_info = unserialize(file_get_contents($ready_file));
    else
      $ready_info = new ReadyInfo();
    file_put_contents($ready_file, serialize($ready_info));
    $game_id = $ready_info->current_game();
    $game = new Game();
    $_SESSION['game_id'] = $game_id;
    ?>
    <div class="side-by-side">
      <div id="our_board" class="battle-grid">
        <?php
        echo $game->our_arena->get_board()->build_display();
        ?>
      </div>
      <div id="enemy_board" class="battle-grid">
        <?php
        echo $game->enemy_board->build_display();
        ?>
      </div>
    </div>
    <div class="flex-row">
      <select class="before_ready">
        <option value="5">Carrier</option>
        <option value="4">Battleship</option>
        <option value="3">Submarine</option>
        <option value="3">Destroyer</option>
        <option value="2">Patrol boat</option>
      <select>
      <button class="before_ready before_place" onclick="place_ship()">
        Place ship
      </button>
      <button class="before_ready after_place" onclick="ready()">
        Ready
      </button>
      <button class="after_ready after_place" onclick="surrender()">
        Surrender
      </button>
    </div>
    <?php
    file_put_contents('.game_'.$game_id, serialize($game))
    ?>
  </body>
</html>
