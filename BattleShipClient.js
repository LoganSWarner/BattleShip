document.addEventListener("DOMContentLoaded", function(){
  setAttributes(".after_ready", "disabled", true);
  removeAttributes(".before_ready", "disabled");
  decorate_board();
  var game_listener = new EventSource("battleship_client_teller.php");
  game_listener.onmessage = process_message;
});

function process_message(message){
  if(message.event === 'won')
    process_win(message.data);
  else if(message.event === 'our board update'){
    document.querySelector('#our_board').outerHTML = message.data;
    decorate_board();
  }else if(message.event === 'enemy board update')
    document.querySelector('#enemy_board').outerHTML = message.data;
}

function process_win(who){
  if(who === 'enemy')
    alert('You lost!');
  else
    alert('You won!');
}

function decorate_board(){
  document.querySelectorAll('#our_board > .grid-item').forEach(function(x){
    x.addEventListener('click', respond_to_place);
  });
}

function setAttributes(query, attribute, value){
  document.querySelectorAll(query).forEach(function(x){
    x.setAttribute(attribute, value);
  });
}

function removeAttributes(query, attribute){
  document.querySelectorAll(query).forEach(function(x){
    x.removeAttribute(attribute);
  });
}

function respond_to_place(e){
  var x = parseInt(e.target.dataset.x);
  var y = e.target.dataset.y;
  var ship_name = document.querySelector('#ship > option:checked').text;
  var ship_length = document.querySelector('#ship > option:checked').value;
  var direction = document.querySelector('#direction > option:checked').value;

  if(Number.isInteger(x) && y)
    place_ship(x, y, ship_name, ship_length, direction);
}

function place_ship(x, y, ship_name, ship_length, direction){
  var xhr = new XMLHttpRequest();
  params = `COORDS=${x}${y}&SHIP_NAME=${ship_name}&SHIP_LENGTH=${ship_length}&DIRECTION=${direction}`;
  xhr.open('GET', `place_ship.php?${params}`, true);
  xhr.onload = function(){
    document.querySelector('#our_board').innerHTML = xhr.responseText;
    decorate_board();
  };
  xhr.send(null);
}

function ready(){
  setAttributes(".before_ready", "disabled", true);
  removeAttributes(".after_ready", "disabled");
}

function surrender(){
  setAttributes(".after_ready", "disabled", true);
  removeAttributes(".before_ready", "disabled");
}
