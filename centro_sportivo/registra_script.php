<?php
session_start();
$_SESSION["registrato"] = 0;
require("config.php"); //parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}

$password = $_POST["pw"];
$pw = password_hash($password, PASSWORD_DEFAULT);
$stmt1 = $mydb->prepare("SELECT mail from utente where mail = (?)");
$stmt1->bind_param("s", $_POST["mail"]);
$stmt1->execute();
$risultato = $stmt1->get_result();
$stmt1->close();

if ($risultato->num_rows > 0) {
    // Handle case when the email is already registered
} else {
    $stmt = $mydb->prepare("INSERT INTO utente (mail, pw, nome, cognome, data_nascita) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $_POST["mail"], $pw, $_POST["nome"], $_POST["cognome"], $_POST["data_nascita"]);
    $stmt->execute();
    $stmt->close();
    $_SESSION["registrato"] = 1;
}

header("Location: prenotazione_campi.php");
?>
