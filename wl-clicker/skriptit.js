var kerroin = 1;
var laskuri = 0;
var timerId;
var info = document.getElementById('info');


function nappi(){
    laskuri = laskuri + 1 * kerroin;
    console.log('Pisteet: ' + laskuri);
    tulosta();
    }

function yksipuoli(){
    if (laskuri < 150) {
        info.innerHTML = "Ei pisteet riitä!";
        return;
    }
    laskuri = laskuri-150;
    kerroin = kerroin + 0.5;
    tulosta();
    console.log("kerroin: " + kerroin);
    }

function kolme(){
    if (laskuri < 3000) {
        show();
        info.innerHTML = "Ei pisteet riitä!";
        hide();
        return;
    }
    laskuri = laskuri-3000;
    kerroin = kerroin + 3;
    tulosta();
    console.log("kerroin:" + kerroin);
    }

function kuusi(){
    if (laskuri < 6000) {
        info.innerHTML = "Ei pisteet riitä!";
        return;
    }
    laskuri = laskuri-6000;
    kerroin = kerroin + 6;
    tulosta();
    console.log("kerroin:" + kerroin);
    }

function kymmenen(){
    if (laskuri < 10000) {
        info.innerHTML = "Ei pisteet riitä!";
        return;
    }
    laskuri = laskuri-10000;
    kerroin = kerroin + 10;
    tulosta();
    console.log("kerroin:" + kerroin);
    }

function kaksi(){
    if (laskuri < 20000) {
        info.innerHTML = "Ei pisteet riitä!";
        return;
    }
    laskuri = laskuri-20000;
    kerroin = kerroin + 20;
    tulosta();
    console.log("kerroin:" + kerroin);
    }

function nelja(){
    if (laskuri < 40000) {
        info.innerHTML = "Ei pisteet riitä!";
        return;
    }
    laskuri = laskuri-40000;
    kerroin = kerroin + 40;
    tulosta();
    console.log("kerroin:" + kerroin);
    }

function sata(){
    if (laskuri < 100000) {
        info.innerHTML = "Ei pisteet riitä!";
        return;
    }
    laskuri = laskuri-100000;
    kerroin = kerroin + 100;
    tulosta();
    console.log("kerroin:" + kerroin);
    }

function aloita(){
    if (laskuri < 5000) {
        console.log("not enough CloutTokens")
        return;
    }
    laskuri = laskuri-5;
	timerId = setInterval(laske, 1000);
	}

function tulosta(){
    console.log(laskuri);
    document.getElementById("laskenta").innerHTML = laskuri;
    }

function laskuri(){
    console.log(pisteet);
    tulosta();
    }

function laske(){
    console.log(laskuri);
    laskuri = laskuri + 1 * kerroin * 10;
    laskenta.innerHTML = laskuri;
    }

function hide(){
    setTimeout(function(){
    document.getElementById("info").classList.add('hide');
       }, 3000);
    }

function show(){
    document.getElementById("info").classList.remove('hide');
}