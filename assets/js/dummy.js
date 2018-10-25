
var boxOverlay = {
    boxNumbX: 0,
    boxSpeed: 1,
    boxDelay: 0,
    tcbParticles: new Array(),
    boxSum: 0,
    boxTotalWidth: 0,
    boxBody: null,
    boxContainer: null,
    effect: 0
}


setTimeout(function () {
    startAnimation();
}, 1500);

function SquareFadeAnimation(boxNumbX, boxSpeed, boxDelay, bCreate) {

    boxOverlay.tcbParticles = new Array();

    // speed
    if (boxSpeed === undefined) {				
        boxOverlay.boxSpeed = 200;
    } else { boxOverlay.boxSpeed = boxSpeed; }

    // seq
    if (boxDelay === undefined) {
        boxOverlay.boxDelay = 50;
    } else { boxOverlay.boxDelay = boxDelay; }

    // boxNumbX
    if (boxNumbX === undefined) {
        boxOverlay.boxNumbX = 50;
    } else { boxOverlay.boxNumbX = boxNumbX; }

    boxOverlay.boxBody = document.body;

    // create?!
    if (bCreate === undefined || bCreate === false) {
        boxOverlay.boxContainer = document.getElementById("wv-full-fill");
    } else {
        oWvFullFill = document.createElement("div");
        oWvFullFill.setAttribute("id", "wv-full-fill");
        document.body.insertBefore(oWvFullFill, document.body.childNodes[0]);
        boxOverlay.boxContainer = document.getElementById("wv-full-fill");
    }

    start();
}

function start() {
    var boxTotalWidth = boxOverlay.boxContainer.offsetWidth;
    var boxTotalHeight = boxOverlay.boxContainer.offsetHeight;
    var boxWidth = Math.round(boxTotalWidth / boxOverlay.boxNumbX + 0.5);
    var boxNumbY = Math.round(boxTotalHeight / boxWidth + 0.5);
    var Particle, i, j;
    boxOverlay.boxSum = boxOverlay.boxNumbX * boxNumbY;
    boxOverlay.boxTotalWidth = boxWidth;
    var boxNumbXPos = 0, boxNumbYPos = 0;


    for (i = 0; i < boxNumbY; i++) {
        for (j = 0; j < boxOverlay.boxNumbX; j++) {
            Particle = document.createElement("div");
            Particle.style.position = "fixed";
            Particle.style.width = boxWidth + "px";
            Particle.style.height = boxWidth + "px";
            Particle.style.backgroundColor = "#aaaaaa";
            Particle.style.left = j * boxWidth + "px";
            Particle.style.top = i * boxWidth + "px";
            Particle.style.transition = "all " + (boxOverlay.boxSpeed / 1000) + "s";
            boxOverlay.tcbParticles.push(Particle);
        }
    }


    boxOverlay.tcbParticles.arrayRandomizer();
    for (i = 0; i < boxOverlay.boxSum; i++) {
        boxOverlay.boxContainer.appendChild(boxOverlay.tcbParticles[i]);
    }

    boxOverlay.boxContainer.style.backgroundColor = "transparent";

    linearCSSAnimation();
};



function linearCSSAnimation() {
    switch (boxOverlay.effect) {
        case 0:
            boxOverlay.tcbParticles[--boxOverlay.boxSum].style.transform = "perspective(" + boxOverlay.boxTotalWidth * 2 + "px) rotateX(90deg)";
            boxOverlay.tcbParticles[boxOverlay.boxSum].style.opacity = "0.5";
            break;
        case 1:
            boxOverlay.tcbParticles[--boxOverlay.boxSum].style.transform = "translateX(" + boxOverlay.boxTotalWidth * 2 + "px)";
            boxOverlay.tcbParticles[boxOverlay.boxSum].style.opacity = "0";
            break;
        case 2:
            boxOverlay.tcbParticles[--boxOverlay.boxSum].style.transform = "scale(2)";
            boxOverlay.tcbParticles[boxOverlay.boxSum].style.opacity = "0";
            break;
        case 3:
            boxOverlay.tcbParticles[--boxOverlay.boxSum].style.transform = "scale(0.5)";
            boxOverlay.tcbParticles[boxOverlay.boxSum].style.opacity = "0";
            break;
    }

    if (boxOverlay.boxSum !== 0) {
        setTimeout(function () {
            linearCSSAnimation();
        }, boxOverlay.boxDelay);
    } else {
        setTimeout(function () {
            boxOverlay.boxBody.removeChild(boxOverlay.boxContainer);
        }, boxOverlay.boxSpeed);
        return false;
    }
};



// arrarRandomizer() 
Array.prototype.arrayRandomizer = function () {
    var len = this.length, x, temp;
    if (len === 0) return false;
    while (--len) {
        x = Math.floor(Math.random() * len);
        temp = this[len];
        this[len] = this[x];
        this[x] = temp;
    }
};



/*
   form   
*/

function startAnimation() {
    var boxNumbX = document.getElementsByName("x")[0].value;
    var boxSpeed = document.getElementsByName("speed")[0].value;
    var boxDelay = document.getElementsByName("seq")[0].value;

    SquareFadeAnimation(boxNumbX, boxSpeed, boxDelay, true);
}

function setRange(cName, nValue) {
    var textbox = document.getElementById("i" + cName);
    textbox.innerHTML = "" + nValue;
}

function effectChange(o) {
    boxOverlay.effect = o.selectedIndex
}