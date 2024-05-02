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
      $sport = $data['sport'];
      switch ($sport) {
        case "calcetto":
            $stmt = $mydb->prepare("SELECT orario.ora
            FROM orario
            LEFT JOIN (
                SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                FROM prenotazione
                JOIN campo ON prenotazione.fkCampo = campo.id
                WHERE prenotazione.giorno = ?
                    AND campo.nome = 'calcetto1'
            ) AS prenotazioni
            ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
            WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt->execute()) {
              $stmt->bind_result($ora);
              while ($stmt->fetch()) {
                  $result1[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result1 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
              
       
      
              $stmt2 = $mydb->prepare("SELECT orario.ora
              FROM orario
              LEFT JOIN (
                  SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                  FROM prenotazione
                  JOIN campo ON prenotazione.fkCampo = campo.id
                  WHERE prenotazione.giorno = ?
                      AND campo.nome = 'calcetto2'
              ) AS prenotazioni
              ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
              WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt2->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt2->execute()) {
              $stmt2->bind_result($ora);
              while ($stmt2->fetch()) {
                  $result2[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt2->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result2 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
      
      
              $merged_result = array_merge($result1, $result2);
              $merged_result = array_unique($merged_result, SORT_REGULAR);
              function compareTime($a, $b) {
                  return strtotime($a['ora']) - strtotime($b['ora']);
              }
              
              // Ordina l'array combinato utilizzando la funzione di confronto personalizzata
              usort($merged_result, 'compareTime') ;
      
              // Invia i dati JSON con l'array unito
              echo json_encode(["merged_result" => array_values($merged_result)]);
        break;
        case "tennis":
            $stmt = $mydb->prepare("SELECT orario.ora
            FROM orario
            LEFT JOIN (
                SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                FROM prenotazione
                JOIN campo ON prenotazione.fkCampo = campo.id
                WHERE prenotazione.giorno = ?
                    AND campo.nome = 'tennis1'
            ) AS prenotazioni
            ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
            WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt->execute()) {
              $stmt->bind_result($ora);
              while ($stmt->fetch()) {
                  $result1[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result1 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
              
       
      
              $stmt2 = $mydb->prepare("SELECT orario.ora
              FROM orario
              LEFT JOIN (
                  SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                  FROM prenotazione
                  JOIN campo ON prenotazione.fkCampo = campo.id
                  WHERE prenotazione.giorno = ?
                      AND campo.nome = 'tennis2'
              ) AS prenotazioni
              ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
              WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt2->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt2->execute()) {
              $stmt2->bind_result($ora);
              while ($stmt2->fetch()) {
                  $result2[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt2->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result2 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
      
      
              $merged_result = array_merge($result1, $result2);
              $merged_result = array_unique($merged_result, SORT_REGULAR);
              function compareTime($a, $b) {
                  return strtotime($a['ora']) - strtotime($b['ora']);
              }
              
              // Ordina l'array combinato utilizzando la funzione di confronto personalizzata
              usort($merged_result, 'compareTime') ;
      
              // Invia i dati JSON con l'array unito
              echo json_encode(["merged_result" => array_values($merged_result)]);            break;
        case "padel":
            $stmt = $mydb->prepare("SELECT orario.ora
            FROM orario
            LEFT JOIN (
                SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                FROM prenotazione
                JOIN campo ON prenotazione.fkCampo = campo.id
                WHERE prenotazione.giorno = ?
                    AND campo.nome = 'padel1'
            ) AS prenotazioni
            ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
            WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt->execute()) {
              $stmt->bind_result($ora);
              while ($stmt->fetch()) {
                  $result1[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result1 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
              
       
      
              $stmt2 = $mydb->prepare("SELECT orario.ora
              FROM orario
              LEFT JOIN (
                  SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                  FROM prenotazione
                  JOIN campo ON prenotazione.fkCampo = campo.id
                  WHERE prenotazione.giorno = ?
                      AND campo.nome = 'padel2'
              ) AS prenotazioni
              ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
              WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt2->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt2->execute()) {
              $stmt2->bind_result($ora);
              while ($stmt2->fetch()) {
                  $result2[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt2->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result2 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
      
      
              $merged_result = array_merge($result1, $result2);
              $merged_result = array_unique($merged_result, SORT_REGULAR);
              function compareTime($a, $b) {
                  return strtotime($a['ora']) - strtotime($b['ora']);
              }
              
              // Ordina l'array combinato utilizzando la funzione di confronto personalizzata
              usort($merged_result, 'compareTime') ;
      
              // Invia i dati JSON con l'array unito
              echo json_encode(["merged_result" => array_values($merged_result)]);
        break;
        case "calcio":
            $stmt = $mydb->prepare("SELECT orario.ora
            FROM orario
            LEFT JOIN (
                SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                FROM prenotazione
                JOIN campo ON prenotazione.fkCampo = campo.id
                WHERE prenotazione.giorno = ?
                    AND campo.nome = 'calcio'
            ) AS prenotazioni
            ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
            WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt->execute()) {
              $stmt->bind_result($ora);
              while ($stmt->fetch()) {
                  $result1[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result1 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
              // Invia i dati JSON con l'array unito
              echo json_encode(["merged_result" => array_values($result1)]);
        break;
        case "nuoto":
            $stmt = $mydb->prepare("SELECT orario.ora
            FROM orario
            LEFT JOIN (
                SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                FROM prenotazione
                JOIN campo ON prenotazione.fkCampo = campo.id
                WHERE prenotazione.giorno = ?
                    AND campo.nome = 'piscina1'
            ) AS prenotazioni
            ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
            WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt->execute()) {
              $stmt->bind_result($ora);
              while ($stmt->fetch()) {
                  $result1[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result1 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
              
       
      
              $stmt2 = $mydb->prepare("SELECT orario.ora
              FROM orario
              LEFT JOIN (
                  SELECT prenotazione.ora_inizio, prenotazione.ora_fine
                  FROM prenotazione
                  JOIN campo ON prenotazione.fkCampo = campo.id
                  WHERE prenotazione.giorno = ?
                      AND campo.nome = 'piscina2'
              ) AS prenotazioni
              ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
              WHERE prenotazioni.ora_inizio IS NULL;");
            $stmt2->bind_param("s", $giornoPr);
            // Esegui la query SQL
            if ($stmt2->execute()) {
              $stmt2->bind_result($ora);
              while ($stmt2->fetch()) {
                  $result2[] = [
                      "ora" => $ora,
                  ];
              }
              $stmt2->close();
            } else {
                  // Gestione degli errori durante l'esecuzione della query
                  $result2 = [
                      "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
                  ];
                  
              }
      
      
              $merged_result = array_merge($result1, $result2);
              $merged_result = array_unique($merged_result, SORT_REGULAR);
              function compareTime($a, $b) {
                  return strtotime($a['ora']) - strtotime($b['ora']);
              }
              
              // Ordina l'array combinato utilizzando la funzione di confronto personalizzata
              usort($merged_result, 'compareTime') ;
      
              // Invia i dati JSON con l'array unito
              echo json_encode(["merged_result" => array_values($merged_result)]);
        break;
        default:
            echo "errore.";
            break;
    }

      /* $stmt = $mydb->prepare("SELECT orario.ora
      FROM orario
      LEFT JOIN (
          SELECT prenotazione.ora_inizio, prenotazione.ora_fine
          FROM prenotazione
          JOIN campo ON prenotazione.fkCampo = campo.id
          WHERE prenotazione.giorno = ?
              AND campo.nome = 'calcetto1'
      ) AS prenotazioni
      ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
      WHERE prenotazioni.ora_inizio IS NULL;");
      $stmt->bind_param("s", $giornoPr);
      // Esegui la query SQL
      if ($stmt->execute()) {
        $stmt->bind_result($ora);
        while ($stmt->fetch()) {
            $result1[] = [
                "ora" => $ora,
            ];
        }
        $stmt->close();
      } else {
            // Gestione degli errori durante l'esecuzione della query
            $result1 = [
                "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
            ];
            
        }
        
 

        $stmt2 = $mydb->prepare("SELECT orario.ora
        FROM orario
        LEFT JOIN (
            SELECT prenotazione.ora_inizio, prenotazione.ora_fine
            FROM prenotazione
            JOIN campo ON prenotazione.fkCampo = campo.id
            WHERE prenotazione.giorno = ?
                AND campo.nome = 'calcetto2'
        ) AS prenotazioni
        ON orario.ora >= prenotazioni.ora_inizio AND orario.ora < prenotazioni.ora_fine
        WHERE prenotazioni.ora_inizio IS NULL;");
      $stmt2->bind_param("s", $giornoPr);
      // Esegui la query SQL
      if ($stmt2->execute()) {
        $stmt2->bind_result($ora);
        while ($stmt2->fetch()) {
            $result2[] = [
                "ora" => $ora,
            ];
        }
        $stmt2->close();
      } else {
            // Gestione degli errori durante l'esecuzione della query
            $result2 = [
                "error" => "Errore durante l'esecuzione della query: " . $mydb->errno . " - " . $mydb->error
            ];
            
        }


        $merged_result = array_merge($result1, $result2);
        $merged_result = array_unique($merged_result, SORT_REGULAR);
        function compareTime($a, $b) {
            return strtotime($a['ora']) - strtotime($b['ora']);
        }
        
        // Ordina l'array combinato utilizzando la funzione di confronto personalizzata
        usort($merged_result, 'compareTime') ;

        // Invia i dati JSON con l'array unito
        echo json_encode(["merged_result" => array_values($merged_result)]); */

    }
}