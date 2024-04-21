<?php
session_start();

header("Access-Control-Allow-Origin: *");

// Consenti l'utilizzo di alcune intestazioni specifiche (incluso Content-Type)
header("Access-Control-Allow-Headers: Content-Type");

// Altri header che potrebbero essere richiesti

header('Content-Type: application/json');

require("config.php"); //parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $user = $_SESSION["user"];



    $stmt = $mydb->prepare("SELECT prenotazione.id, prenotazione.fkCampo, campo.nome, prenotazione.giorno, prenotazione.ora_inizio, prenotazione.ora_fine FROM prenotazione join campo on prenotazione.fkCampo = campo.id WHERE fkUtente = ?");
    $stmt->bind_param("i", $user);
    if ($stmt->execute()) {
        $stmt->bind_result($id, $fkCampo, $nomeCampo, $giorno, $oraInizio, $oraFine);
        while ($stmt->fetch()) {
            $result[] = [
                "id" => $id,
                "fkCampo" => $fkCampo,
                "nomeCampo" => $nomeCampo,
                "giorno"=> $giorno,
                "oraInizio" => $oraInizio,
                "oraFine" => $oraFine,
            ];
        }
    }
    if (is_null($result)) {
        $result = [];
    }

    echo json_encode($result);
}



