<?php
session_start();

// Muodosta tietokantayhteys
require('config/config.php');
require('config/db.php');

// Tarkista tullaanko oikealta lomakkeelta
if (!isset($_POST['firstname']) || !isset($_POST['lastname'])) {
    header('Location: register.php');
    die('Et tullut oikealta lomakkeelta');
}

// Tarkistetaan käyttäjän antaman syötteet

/* 
TODO:
1. Tarkista onko email käytössä
2. Tarkista syötteistä SQL-injektio
*/

unset($_SESSION['error']);

if (empty($_POST["firstname"])){
    $_SESSION['error'][] = "Etunimi ei saa olla tyhjä";
}

if (empty($_POST["lastname"])){
    $_SESSION['error'][] = "Sukunimi ei saa olla tyhjä";
}

if (empty($_POST["passwd"])){
    $_SESSION['error'][] = "Salasana ei saa olla tyhjä";
}

if ($_POST['passwd'] != $_POST['passwd2']) {
    $_SESSION['error'][] = "Salasanat eivät täsmää";
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'][] = "Sähköpostiosoite ei ole oikein";
    
}

if (isset($_SESSION['error'])) {
    header('Location: register.php');
    die();
}


// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, passwd)
                         VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $email, $passwd);



// insert a row
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);;
$email = trim($_POST['email']);


$passwd = trim($_POST['passwd']);
$passwd = password_hash($passwd, PASSWORD_DEFAULT);

if ($stmt->execute()) {
    // echo "Käyttäjä lisätty";
    header("location: login.php");
} else {
    echo "Joku ongelma";
}