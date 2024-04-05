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
      $anno = $data['anno'];
      $mese = $data['mese'];
      $giorno = $data['giorno'];
      $giornoPr = "$anno-$mese-$giorno";

      $stmt = $mydb->prepare("SELECT campo.nome, prenotazione.ora_inizio, prenotazione.ora_fine 
      FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
      where prenotazione.giorno = ?");
      $stmt->bind_param("s", $giornoPr);
      if ($stmt->execute()) {
         $stmt->bind_result($nomeCampo, $oraInizio, $oraFine);
         while ($stmt->fetch()) {
             $result[] = [
                 "nomeCampo" => $nomeCampo,
                 "oraInizio" => $oraInizio,
                 "oraFine" => $oraFine,
             ];
         }
         $stmt->close();
      }else {
         // Gestione degli errori durante l'esecuzione della query
         $result = [
             "error" => "Errore durante l'esecuzione della query"
         ];
     }
} else {
   http_response_code(400);
   echo "Invalid JSON data";
}
}