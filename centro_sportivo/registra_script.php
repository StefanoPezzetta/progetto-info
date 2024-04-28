<?php
session_start();
require("config.php");
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);

if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    if ($data !== null) {
        $email = $data["email"];
        $pw = $data["password"];
        $nome = $data["nome"];
        $cognome = $data["cognome"];
        $data_nascita = $data["data_nascita"];
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $stmt = $mydb->prepare("SELECT * FROM utente WHERE mail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $result = $stmt->get_result();

            $num_rows = $result->num_rows;

            $stmt->close();

            if ($num_rows >= 1) {
                header('HTTP/1.1 409 Conflict');
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Email già in uso']);
            }else{
                $password = password_hash($pw, PASSWORD_DEFAULT);
                $stmt = $mydb->prepare("INSERT INTO utente (mail, pw, nome, cognome, data_nascita) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $email, $password, $nome, $cognome, $data_nascita);
                if($stmt->execute()){
                    $stmt->close();

                    $stmt3 = $mydb->prepare("SELECT id FROM utente WHERE mail = ?");
                    $stmt3->bind_param("s", $email);
                    if ($stmt3->execute()) {
                        $stmt3->bind_result($user);
                        $stmt3->fetch();
                        $_SESSION["user"] = $user;
                    }
                    $stmt3->close(); 
                    header('Content-Type: application/json');
                    echo json_encode(['success' => true, 'message' => 'Accesso riuscito']);                    
                } else {
                    // Errore durante l'inserimento
                    $stmt->close();
                    header('HTTP/1.1 500 Internal Server Error');
                    header('Content-Type: application/json');
                    echo json_encode(['error' => 'Errore durante la registrazione. Per favore, riprova.']);
                }

            }
        } else {
            // L'email non è valida, gestisci l'errore
            // Risposta JSON per credenziali errate
            header('HTTP/1.1 400 Bad Request');
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Email non valida']);
        }

        
    }
}
            


   
?> 

