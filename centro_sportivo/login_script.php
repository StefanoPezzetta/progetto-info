<?php
session_start();
$_SESSION["registrato"] = 1;
require("config.php"); //parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}

$stmt1 = $mydb->prepare("SELECT pw FROM utente WHERE mail = ?");
$stmt1->bind_param("s", $_POST["mail"]);
if ($stmt1->execute()) {
    $stmt1->bind_result($hash);
    $stmt1->fetch();
    $stmt1->close();

    if ($hash !== NULL && password_verify($_POST["password"], $hash)==true) {
        // User has entered correct credentials
        $_SESSION["registrato"] = 0;
        header("Location: prenotazione_campi.php");
        exit(); // Termina lo script dopo il reindirizzamento
    } else {
        header("Location: login.php");
        exit(); // Termina lo script dopo il reindirizzamento
    }
}
else {
    // Gestione degli errori durante l'esecuzione della query
    echo json_encode(["error" => "Errore durante l'esecuzione della query"]);
    exit();
}

