document.addEventListener("DOMContentLoaded", function(){
  setAttributes(".after_ready", "disabled", true);
  removeAttributes(".before_ready", "disabled");
  refresh_board();
});

function refresh_board(){
  document.querySelectorAll('.grid-item').forEach(function(x){
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
  var y = parseInt(e.target.dataset.y);
  var ship_name = document.querySelector('option:checked').text;
  var ship_length = document.querySelector('option:checked').value;
  var direction = 0;

  alert(ship_name);
  alert(ship_length);
  if(Number.isInteger(x) && Number.isInteger(y))
    place_ship(x, y, ship_name, ship_length, direction);
}

function place_ship(x, y, ship_name, ship_length, direction){
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'place_ship.php');
  xhr.onload = function(){
    alert('Place ship got: ' + xhr.responseText);
  };
  params = `COORDS=${x}${y}&SHIP_NAME=${ship_name}&SHIP_LENGTH=${ship_length}&DIRECTION=${direction}`;
  xhr.send(params);
}

function ready(){
  setAttributes(".before_ready", "disabled", true);
  removeAttributes(".after_ready", "disabled");
}

function surrender(){
  setAttributes(".after_ready", "disabled", true);
  removeAttributes(".before_ready", "disabled");
}
