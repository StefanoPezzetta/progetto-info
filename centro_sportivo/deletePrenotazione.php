<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
   // Leggi il corpo della richiesta
   $json_data = file_get_contents("php://input");

   // Decodifica la stringa JSON in un array associativo
   $data = json_decode($json_data, true);
   if ($data !== null) {
      $id = $data['id'];

      $stmt = $mydb->prepare("DELETE FROM prenotazione WHERE id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $stmt->close();

} else {
   http_response_code(400);
   echo "Invalid JSON data";
}
}