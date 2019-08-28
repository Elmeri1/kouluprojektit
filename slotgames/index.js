
var rahat = 50;

var info = document.getElementById('info');


function slot1() {
    return Math.floor(Math.random() * 3);
}

function slot2() {
    return Math.floor(Math.random() * 3);
}

function slot3() {
   return Math.floor(Math.random() * 3);
    //document.getElementById('slot3').innerHTML = slot3();
}

function voitto() {
    if (slot1 == slot2 && slot2 == slot3) {
        rahat = rahat + 5;
    } else {
        rahat = rahat -1;
    }
    
}

function kierros() {

    // var n1 = slot1();
    // var n2 = slot1();

    document.getElementById("slot1").innerHTML = slot1();
    document.getElementById("slot2").innerHTML = slot2();
    document.getElementById("slot3").innerHTML = slot3();
    document.getElementById("raha").innerHTML = voitto();
    // slot1();
    // slot2();
    // slot3();
}


