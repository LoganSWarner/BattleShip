document.addEventListener("DOMContentLoaded", function(){
  setAttributes(".after_ready", "disabled", true);
  removeAttributes(".before_ready", "disabled");
});

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

function place_ship(x, y){
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'place_ship.php');
  xhr.onreadystatechange = function(){
    if(xhr.readyState === 4){
      alert(xhr.responseText);
    }
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
