<?php
session_start();

header("Access-Control-Allow-Origin: *");

// Consenti l'utilizzo di alcune intestazioni specifiche (incluso Content-Type)
header("Access-Control-Allow-Headers: Content-Type");

// Altri header che potrebbero essere richiesti

header('Content-Type: application/json');

$_SESSION["emailInUso"] = 0;
require("config.php"); //parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $user = $_SESSION["user"];



    $stmt = $mydb->prepare("SELECT id, fkCampo, giorno, ora_inizio, ora_fine FROM prenotazione WHERE fkUtente = ?");
    $stmt->bind_param("i", $user);
    if ($stmt->execute()) {
        $stmt->bind_result($id, $fkCampo, $giorno, $oraInizio, $oraFine);
        while ($stmt->fetch()) {
            $result[] = [
                "id" => $id,
                "nomeCampo" => $nomeCampo,
                "sportCampo"=> $sportCampo,
                "oraInizio" => $oraInizio,
                "oraFine" => $oraFine,
            ];
        }
    }

    echo json_encode($result);
}



