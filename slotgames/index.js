
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

var saa_lukita = false;

// var info = document.getElementById('info');

var button = document.querySelector('nappi');

function onclick() {
    // lukko1,lukko2,lukko3.onclick = document.getElementById("lukko1, lukko2, lukko3").style.color = "red";
   
}

function panos(p) {
    if (p == 1) {
        rahat = rahat - 1;
    } else {

    }

    if (p == 2) {
        rahat = rahat - 2;
    } else {

    }

    if (p == 3) {
        rahat = rahat - 3;
    } else {
        
    }

}


function slot() {
    return Math.floor(Math.random() * 7);
}

function voitto(slot1, slot2, slot3) {
    if (slot1 == slot2 && slot2 == slot3) {
        rahat = rahat + 5;
    }
}

function kierros() {

    // rahat = rahat - 1;
    panos()

    if (lukko1 == 0) {
        n1 = slot();
    } else {
        // lukko1 = 0;
    }

    if (lukko2 == 0) {
        n2 = slot();
    } else {
        // lukko2 = 0;
    }

    if (lukko3 == 0) {
        n3 = slot();
    } else {
        // lukko3 = 0;
    }

    if (rahat < 1) {
        return;
    }

    if (lukko1 == 1 || lukko2 == 1 || lukko3 ==1) {
        
        saa_lukita = false;
        lukko1 = lukko2 = lukko3 = 0;

    } else {
        
        saa_lukita = true;

    }

    voitto(n1,n2,n3);

    update();

}

function lukitse(s) {

    if (saa_lukita == false) {
        return;
    }

    // muutetaan valittu lukko-muuttuja ykköseksi
    if (s == 1){
        if (lukko1 == 0) {
            lukko1 = 1;
        } else {
            lukko1 = 0;
        }
    }

    if (s == 2) {
        if (lukko2 == 0) {
            lukko2 = 1;
        } else {
            lukko2 = 0;
        }
        
    }

    if (s == 3) {
        if (lukko3 == 0) {
            lukko3 = 1;
        } else {
            lukko3 = 0;
        }
        
    }

    // saa_lukita = false;

    update();

}

function update() {

    // update slots
    document.getElementById("slot1").innerHTML = n1;
    document.getElementById("slot2").innerHTML = n2;
    document.getElementById("slot3").innerHTML = n3;

    document.getElementById("raha").innerHTML = rahat;

    if (lukko1 == 1) {
        document.getElementById("lukko1").classList.add("btnLock");
    } else {
        document.getElementById("lukko1").classList.remove("btnLock");
    }

    if (lukko2 == 1) {
        document.getElementById("lukko2").classList.add("btnLock");
    } else {
        document.getElementById("lukko2").classList.remove("btnLock");
    }

    if (lukko3 == 1) {
        document.getElementById("lukko3").classList.add("btnLock");
    } else {
        document.getElementById("lukko3").classList.remove("btnLock");
    }

    if (saa_lukita == false){
        document.getElementById("lukko1").disabled = true;
    } else {
        document.getElementById("lukko1").disabled = false;
    }

    if (saa_lukita == false){
        document.getElementById("lukko2").disabled = true;
    } else {
        document.getElementById("lukko2").disabled = false;
    }

    if (saa_lukita == false){
        document.getElementById("lukko3").disabled = true;
    } else {
        document.getElementById("lukko3").disabled = false;
    }

}