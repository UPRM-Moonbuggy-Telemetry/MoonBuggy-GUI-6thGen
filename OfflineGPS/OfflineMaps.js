//west lat limit:  -86.655645
//east lat limit:  -86.652185
//north long limit: 34.711180
//south long limit: 34.709558

//TODO make API so that move is started on ajax pull
//TODO (optional) make API easily integretable, no need to pass complicated HTML lines

function move(width, height, elemWidth, elemHeight, lat, long) {
  var elem = document.getElementById("element");
  var elemStyle = elem.style;
  elemStyle.position = "absolute";
  elemStyle.width = elemWidth + "px";
  elemStyle.height = elemHeight + "px";

  var paren = document.getElementById("parent");
  var parenStyle = paren.style;
  parenStyle.position = "relative";
  parenStyle.width = width + "px";
  parenStyle.height = height + "px";


  paren = paren.getBoundingClientRect();
  console.log("img pos: "+paren.left+ ", "+ paren.right+ ", "+ paren.height+", "+ paren.width);
  var parenPos = {
    left: paren.left + window.scrollX,
    top: paren.top + window.scrollY,
    right: paren.left + paren.width
  };

      yPos = map(getRndNumber(34.709558,34.711180), 34.709558, 34.711180, parenPos.top, parenPos.top + paren.height);
      xPos = map(getRndNumber(-86.655645, -86.652185), -86.655645, -86.652185, parenPos.left, parenPos.left + paren.width);
      elem.style.top = yPos + 'px';
      elem.style.left = xPos + 'px';
}

function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min) ) + min;
}

function getRndNumber(min, max){
  return (Math.random() * (max - min) ) + min;
}

function map(x, in_min, in_max, out_min, out_max) {
  return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
}
