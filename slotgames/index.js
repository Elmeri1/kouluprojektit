
var rahat = 0;
var slot1 = 0;
var slot2 = 0;
var slot3 = 0;
var info = document.getElementById('info');
var kierros = "";

function slot1() {
    return Math.floor(Math.random() * 3);
}

function slot2() {
    return Math.floor(Math.random() * 3);
}

function slot3() {
    return Math.floor(Math.random() * 3);
}

function voitto() {
    if (slot1 == slot2 && slot2 == slot3) {
        rahat = rahat + 5;
        return;
    }
    
}

function kierros() {
    slot1();
    slot2();
    slot3();
}
