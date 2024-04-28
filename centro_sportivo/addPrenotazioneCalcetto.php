<?php
session_start();
/* $_SESSION['user'] = null;
 */header("Access-Control-Allow-Origin: *");

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
    if(isset($_SESSION['user'])){
        // Leggi il corpo della richiesta
    $json_data = file_get_contents("php://input");

    // Decodifica la stringa JSON in un array associativo
    $data = json_decode($json_data, true);
    if ($data !== null) {
        $sport = $data['sport'];
        $orarioInizio = $data['orarioInizio'];
        $orarioFine = $data['orarioFine'];
        $anno = $data['anno'];
        $mese = $data['mese'];
        $giorno = $data['giorno'];
        $giornoPr = "$anno-$mese-$giorno";
        $user = $_SESSION["user"];
        $calcetto1 = 2;
        $calcetto2 = 4;
        $tennis1 = 1;
        $tennis2 = 3;
        $padel1 = 5;
        $padel2 = 6;
        $calcio = 7;
        $nuoto1 = 8;
        $nuoto2 = 9;

        switch ($sport) {
            case "calcetto":
                $stmt = $mydb->prepare("SELECT prenotazione.id FROM prenotazione JOIN campo on campo.id = prenotazione.fkCampo WHERE prenotazione.ora_inizio = ? AND campo.nome = 'calcetto1'");
                if (!$stmt) {
                    http_response_code(500);
                    echo json_encode(["error" => "Error preparing statement"]);
                    exit();
                }
                
                $stmt->bind_param("s", $orarioInizio);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    // Inserimento in calcetto2
                    $stmt2 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                    if (!$stmt2) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error preparing statement"]);
                        exit();
                    }
                    
                    $stmt2->bind_param("iisss", $user, $calcetto2, $giornoPr, $orarioInizio, $orarioFine);
                    if (!$stmt2->execute()) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error executing statement"]);
                        exit();
                    }
                    
                    $stmt2->close();
                } else {
                    // Inserimento in calcetto1
                    $stmt3 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                    if (!$stmt3) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error preparing statement"]);
                        exit();
                    }
                    
                    $stmt3->bind_param("iisss", $user, $calcetto1, $giornoPr, $orarioInizio, $orarioFine);
                    if (!$stmt3->execute()) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error executing statement"]);
                        exit();
                    }
                    
                    $stmt3->close();
                }
        
                $stmt->close();
                break;
            case "tennis":
                $stmt = $mydb->prepare("SELECT prenotazione.id FROM prenotazione JOIN campo on campo.id = prenotazione.fkCampo WHERE prenotazione.ora_inizio = ? AND campo.nome = 'tennis1'");
                if (!$stmt) {
                    http_response_code(500);
                    echo json_encode(["error" => "Error preparing statement"]);
                    exit();
                }
                
                $stmt->bind_param("s", $orarioInizio);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    // Inserimento in tennis2
                    $stmt2 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                    if (!$stmt2) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error preparing statement"]);
                        exit();
                    }
                    
                    $stmt2->bind_param("iisss", $user, $tennis2, $giornoPr, $orarioInizio, $orarioFine);
                    if (!$stmt2->execute()) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error executing statement"]);
                        exit();
                    }
                    
                    $stmt2->close();
                } else {
                    // Inserimento in calcetto1
                    $stmt3 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                    if (!$stmt3) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error preparing statement"]);
                        exit();
                    }
                    
                    $stmt3->bind_param("iisss", $user, $tennis1, $giornoPr, $orarioInizio, $orarioFine);
                    if (!$stmt3->execute()) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error executing statement"]);
                        exit();
                    }
                    
                    $stmt3->close();
                }
        
                $stmt->close();
                break;
            case "padel":
                $stmt = $mydb->prepare("SELECT prenotazione.id FROM prenotazione JOIN campo on campo.id = prenotazione.fkCampo WHERE prenotazione.ora_inizio = ? AND campo.nome = 'padel1'");
                if (!$stmt) {
                    http_response_code(500);
                    echo json_encode(["error" => "Error preparing statement"]);
                    exit();
                }
                
                $stmt->bind_param("s", $orarioInizio);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    // Inserimento in padel2
                    $stmt2 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                    if (!$stmt2) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error preparing statement"]);
                        exit();
                    }
                    
                    $stmt2->bind_param("iisss", $user, $padel2, $giornoPr, $orarioInizio, $orarioFine);
                    if (!$stmt2->execute()) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error executing statement"]);
                        exit();
                    }
                    
                    $stmt2->close();
                } else {
                    // Inserimento in padel1
                    $stmt3 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                    if (!$stmt3) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error preparing statement"]);
                        exit();
                    }
                    
                    $stmt3->bind_param("iisss", $user, $padel1, $giornoPr, $orarioInizio, $orarioFine);
                    if (!$stmt3->execute()) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error executing statement"]);
                        exit();
                    }
                    
                    $stmt3->close();
                }
        
                $stmt->close();
                break;
                case "calcio":
                    // Inserimento in calcio
                    $stmt = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");    
                    $stmt->bind_param("iisss", $user, $calcio, $giornoPr, $orarioInizio, $orarioFine);
                    if (!$stmt->execute()) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error executing statement"]);
                        exit();
                    }
                        
                    $stmt->close();
            
                break;
                case "nuoto":
                    $stmt = $mydb->prepare("SELECT prenotazione.id FROM prenotazione JOIN campo on campo.id = prenotazione.fkCampo WHERE prenotazione.ora_inizio = ? AND campo.nome = 'piscina1'");
                    if (!$stmt) {
                        http_response_code(500);
                        echo json_encode(["error" => "Error preparing statement"]);
                        exit();
                    }
                    
                    $stmt->bind_param("s", $orarioInizio);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if ($result->num_rows > 0) {
                        // Inserimento in nuoto2
                        $stmt2 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                        if (!$stmt2) {
                            http_response_code(500);
                            echo json_encode(["error" => "Error preparing statement"]);
                            exit();
                        }
                        
                        $stmt2->bind_param("iisss", $user, $nuoto2, $giornoPr, $orarioInizio, $orarioFine);
                        if (!$stmt2->execute()) {
                            http_response_code(500);
                            echo json_encode(["error" => "Error executing statement"]);
                            exit();
                        }
                        
                        $stmt2->close();
                    } else {
                        // Inserimento in nuoto1
                        $stmt3 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
                        if (!$stmt3) {
                            http_response_code(500);
                            echo json_encode(["error" => "Error preparing statement"]);
                            exit();
                        }
                        
                        $stmt3->bind_param("iisss", $user, $nuoto1, $giornoPr, $orarioInizio, $orarioFine);
                        if (!$stmt3->execute()) {
                            http_response_code(500);
                            echo json_encode(["error" => "Error executing statement"]);
                            exit();
                        }
                        
                        $stmt3->close();
                    }
            
                    $stmt->close();
                    break;
            default:
                echo "errore.";
                break;
        }
        
        // Preparazione della query per cercare una prenotazione esistente
        /* $stmt = $mydb->prepare("SELECT prenotazione.id FROM prenotazione JOIN campo on campo.id = prenotazione.fkCampo WHERE prenotazione.ora_inizio = ? AND campo.nome = 'calcetto1'");
        if (!$stmt) {
            http_response_code(500);
            echo json_encode(["error" => "Error preparing statement"]);
            exit();
        }
        
        $stmt->bind_param("s", $orarioInizio);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Inserimento in calcetto2
            $stmt2 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
            if (!$stmt2) {
                http_response_code(500);
                echo json_encode(["error" => "Error preparing statement"]);
                exit();
            }
            
            $stmt2->bind_param("iisss", $user, $calcetto2, $giornoPr, $orarioInizio, $orarioFine);
            if (!$stmt2->execute()) {
                http_response_code(500);
                echo json_encode(["error" => "Error executing statement"]);
                exit();
            }
            
            $stmt2->close();
        } else {
            // Inserimento in calcetto1
            $stmt3 = $mydb->prepare("INSERT INTO prenotazione(fkUtente, fkCampo, giorno, ora_inizio, ora_fine) VALUES(?, ?, ?, ?, ?)");
            if (!$stmt3) {
                http_response_code(500);
                echo json_encode(["error" => "Error preparing statement"]);
                exit();
            }
            
            $stmt3->bind_param("iisss", $user, $calcetto1, $giornoPr, $orarioInizio, $orarioFine);
            if (!$stmt3->execute()) {
                http_response_code(500);
                echo json_encode(["error" => "Error executing statement"]);
                exit();
            }
            
            $stmt3->close();
        }

        $stmt->close(); */
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Invalid JSON data"]);
    }}else{
        header('HTTP/1.1 401 Unauthorized');
        header('Content-Type: application/json');
        echo json_encode(['error' => 'utente non registrato']);
    }
} else {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed"]);
}
