<?php
session_start();
$_SESSION["registrato"] = 0;
require("config.php"); //parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}

$stmt1 = $mydb->prepare("SELECT pw from utente where mail = (?)");
$stmt1->bind_param("s", $_POST["mail"]);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc(); // Fetch the data from the result set
$stmt1->close();

if ($row && password_verify($_POST["pw"], $row["pw"])) {
    // User has entered correct credentials
    $_SESSION["registrato"] = 1;
}

header("Location: prenotazione_campi.php");
