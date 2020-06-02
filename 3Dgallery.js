var radius = 350;
var autoRotate = true;
var rotateSpeed = -100;
var imgWidth = 180; 
var imgHeight = 180;

var dragArea = document.getElementById('drag-container');
var spinArea = document.getElementById('spin-container');
var img = spinArea.getElementsByTagName('img');


spinArea.style.width = imgWidth + "px";
spinArea.style.height = imgHeight + "px";


setTimeout(start, 10);

function start(delayTime) {
  for (var i = 0; i < img.length; i++) {
    img[i].style.transform = "rotateY(" + (i * (-360 / img.length)) + "deg) translateZ(" + radius + "px)";
    img[i].style.transition = "transform 1s";
    img[i].style.transitionDelay = delayTime || (img.length - i) / 4 + "s";
  }
}

var tX = 0, tY = 10;

function applyTranform(image) {

  if(tY > 180) tY = 180;
  if(tY < 0) tY = 0;

  image.style.transform = "rotateX(" + (-tY) + "deg) rotateY(" + (tX) + "deg)";
}

function playSpin(rotate) {
  if(rotate){
    spinArea.style.animationPlayState = 'running';
  }
  else{
    spinArea.style.animationPlayState = 'paused';
  }
}

var sX, sY, nX, nY, desX = 0, desY = 0;


if (autoRotate) {
  var spinDirection;
  if(rotateSpeed > 0)
    spinDirection ='forward';
  else
   spinDirection = 'spinRevert';
  spinArea.style.animation = `${spinDirection} ${Math.abs(rotateSpeed)}s infinite linear`;
}


document.onpointerdown = function (e) {
  clearInterval(dragArea.timer);
    e = window.event;
      sX = e.clientX, sY = e.clientY;

  this.onpointermove = function (e) {
    e = window.event;
     nX = e.clientX, nY = e.clientY;
    desX = nX - sX;
    desY = nY - sY;
    tX += desX * 0.1;
    tY += desY * 0.1;
    playSpin(false);
    applyTranform(dragArea);
    sX = nX;
    sY = nY;
  };

  this.onpointerup = function (e) {
    dragArea.timer = setInterval(function () {
      applyTranform(dragArea);
       setTimeout(function(){
        clearInterval(dragArea.timer);
        playSpin(true);
      },100)
    }, 10);
    this.onpointermove = this.onpointerup = null;
  };

  return false;
};

document.onmousewheel = function(e) {
  e = window.event;
  var d = e.wheelDelta / 10;
  radius += d;
 start(true);
};