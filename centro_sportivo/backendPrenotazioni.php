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
      $sport = $data['sport'];
      $anno = $data['anno'];
      $mese = $data['mese'];
      $giorno = $data['giorno'];
      $giornoPr = "$anno-$mese-$giorno";
      switch ($sport) {
        case "calcetto":
            $stmt = $mydb->prepare("SELECT prenotazione.id, campo.nome, campo.sport, prenotazione.ora_inizio, prenotazione.ora_fine 
            FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
            where prenotazione.giorno = ? AND campo.sport = 'calcetto'
            ORDER BY prenotazione.ora_inizio");
            $stmt->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt->execute()) {
              $stmt->bind_result($id, $nomeCampo, $sportCampo, $oraInizio, $oraFine);
              while ($stmt->fetch()) {
                  $result[] = [
                      "id" => $id,
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
              $result = 0;
      
              echo json_encode($result);
      
          }
        break;
        case "tennis":
            $stmt2 = $mydb->prepare("SELECT prenotazione.id, campo.nome, campo.sport, prenotazione.ora_inizio, prenotazione.ora_fine 
            FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
            where prenotazione.giorno = ? AND campo.sport = 'tennis'
            ORDER BY prenotazione.ora_inizio");
            $stmt2->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt2->execute()) {
              $stmt2->bind_result($id, $nomeCampo, $sportCampo, $oraInizio, $oraFine);
              while ($stmt2->fetch()) {
                  $result[] = [
                      "id" => $id,
                      "nomeCampo" => $nomeCampo,
                      "sportCampo"=> $sportCampo,
                      "oraInizio" => $oraInizio,
                      "oraFine" => $oraFine,
                  ];
              }
              $stmt2->close();
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
              $result = 0;
      
              echo json_encode($result);
      
          }
        break;
        case "padel":
            $stmt3 = $mydb->prepare("SELECT prenotazione.id, campo.nome, campo.sport, prenotazione.ora_inizio, prenotazione.ora_fine 
            FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
            where prenotazione.giorno = ? AND campo.sport = 'padel'
            ORDER BY prenotazione.ora_inizio");
            $stmt3->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt3->execute()) {
              $stmt3->bind_result($id, $nomeCampo, $sportCampo, $oraInizio, $oraFine);
              while ($stmt3->fetch()) {
                  $result[] = [
                      "id" => $id,
                      "nomeCampo" => $nomeCampo,
                      "sportCampo"=> $sportCampo,
                      "oraInizio" => $oraInizio,
                      "oraFine" => $oraFine,
                  ];
              }
              $stmt3->close();
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
              $result = 0;
      
              echo json_encode($result);
      
          }
        break;
        case "calcio":
            $stmt4 = $mydb->prepare("SELECT prenotazione.id, campo.nome, campo.sport, prenotazione.ora_inizio, prenotazione.ora_fine 
            FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
            where prenotazione.giorno = ? AND campo.sport = 'calcio'
            ORDER BY prenotazione.ora_inizio");
            $stmt4->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt4->execute()) {
              $stmt4->bind_result($id, $nomeCampo, $sportCampo, $oraInizio, $oraFine);
              while ($stmt4->fetch()) {
                  $result[] = [
                      "id" => $id,
                      "nomeCampo" => $nomeCampo,
                      "sportCampo"=> $sportCampo,
                      "oraInizio" => $oraInizio,
                      "oraFine" => $oraFine,
                  ];
              }
              $stmt4->close();
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
              $result = 0;
      
              echo json_encode($result);
      
          }
        break;
        case "nuoto":
            $stmt5 = $mydb->prepare("SELECT prenotazione.id, campo.nome, campo.sport, prenotazione.ora_inizio, prenotazione.ora_fine 
            FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
            where prenotazione.giorno = ? AND campo.sport = 'nuoto'
            ORDER BY prenotazione.ora_inizio");
            $stmt5->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt5->execute()) {
              $stmt5->bind_result($id, $nomeCampo, $sportCampo, $oraInizio, $oraFine);
              while ($stmt5->fetch()) {
                  $result[] = [
                      "id" => $id,
                      "nomeCampo" => $nomeCampo,
                      "sportCampo"=> $sportCampo,
                      "oraInizio" => $oraInizio,
                      "oraFine" => $oraFine,
                  ];
              }
              $stmt5->close();
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
              $result = 0;
      
              echo json_encode($result);
      
          }
        break;
        default:
            echo "errore";
            break;
    }

      /* $stmt = $mydb->prepare("SELECT prenotazione.id, campo.nome, campo.sport, prenotazione.ora_inizio, prenotazione.ora_fine 
      FROM prenotazione join campo on prenotazione.fkCampo = campo.id 
      where prenotazione.giorno = ? AND campo.sport = 'calcetto'
      ORDER BY prenotazione.ora_inizio");
      $stmt->bind_param("s", $giornoPr);
      // Esegui la query SQL
      if ($stmt->execute()) {
        $stmt->bind_result($id, $nomeCampo, $sportCampo, $oraInizio, $oraFine);
        while ($stmt->fetch()) {
            $result[] = [
                "id" => $id,
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
        $result = 0;

        echo json_encode($result);

    } */

    }
}
