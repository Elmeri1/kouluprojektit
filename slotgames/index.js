
var n1, n2, n3;
var rahat = 100;
// var slot3 = 0;
// var slot2 = 0;
// var slot1 = 0;
var n1 = 0;
var n2 = 0;
var n3 = 0;
var lukko1 = 0;
var lukko2 = 0;
var lukko3 = 0;

var lukitseminen = false;

var info = document.getElementById('info');


function slot() {
    return Math.floor(Math.random() * 3);
}

function voitto(slot1, slot2, slot3) {
    if (slot1 == slot2 && slot2 == slot3) {
        rahat = rahat + 5;
    } else {
        rahat = rahat -1;
    }
    return rahat;
}

function kierros() {

    if (lukko1 == 0) {
        n1 = slot();
    } else {
        lukko1 = 0;
    }

    if (lukko2 == 0) {
        n2 = slot();
    } else {
        lukko2 = 0;
    }

    if (lukko3 == 0) {
        n3 = slot();
    } else {
        lukko3 = 0;
    }

    if (rahat < 1) {
        return;
    }
    document.getElementById("slot1").innerHTML = n1;
    document.getElementById("slot2").innerHTML = n2;
    document.getElementById("slot3").innerHTML = n3;
    document.getElementById("raha").innerHTML = voitto(n1, n2, n3);

}

function lukitse(s) {

    // muutetaan valittu lukko-muuttuja ykköseksi
    if (s == 1){
        lukko1 = 1;
    }
    if (s == 2) {
        lukko2 = 1;
    }
    if (s == 1){
        lukko3 = 1;
    }

    update();




}

function update() {

}