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

      $stmt = $mydb->prepare("SELECT campo.nome, campo.sport, prenotazione.ora_inizio, prenotazione.ora_fine 
      FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
      where prenotazione.giorno = ? AND campo.sport = 'calcetto'
      ORDER BY prenotazione.ora_inizio");
      $stmt->bind_param("s", $giornoPr);
      // Esegui la query SQL
      if ($stmt->execute()) {
        $stmt->bind_result($nomeCampo, $sportCampo, $oraInizio, $oraFine);
        while ($stmt->fetch()) {
            $result[] = [
                "nomeCampo" => $nomeCampo,
                "sportCampo"=> $sportCampo,
                "oraInizio" => $oraInizio,
                "oraFine" => $oraFine,
            ];
        }
        $stmt->close();
      } else {
            // Gestione degli errori durante l'esecuzione della query
            $result = [
                "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
            ];
        }

    // Verifica se $result è definito e contiene dati
    if (isset($result) && count($result) > 0) {
        echo json_encode($result);
    } else {
        // Nessun risultato trovato
        echo json_encode(["error" => "Nessuna prenotazione trovata per il giorno specificato"]);
    }

    }
}
