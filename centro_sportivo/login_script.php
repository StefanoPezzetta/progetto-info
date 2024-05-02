<?php
session_start();
require("config.php"); // Parametri di connessione

// Connessione al database
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    header('Content-Type: application/json');
    echo json_encode(['error' => "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    if ($data !== null) {
        $email = $data['email'];
        $pw = $data['password'];

        $stmt = $mydb->prepare("SELECT pw FROM utente WHERE mail = ?");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            $stmt->bind_result($hash);
            $stmt->fetch();
            $stmt->close();

            if ($hash !== null && password_verify($pw, $hash)) {
                $stmt2 = $mydb->prepare("SELECT id FROM utente WHERE mail = ?");
                $stmt2->bind_param("s", $email);
                $stmt2->execute();
                $stmt2->bind_result($user);
                $stmt2->fetch();
                $stmt2->close();

                $_SESSION["user"] = $user;

                header('Content-Type: application/json');
                echo json_encode(['success' => true, 'message' => 'Accesso riuscito']);
            } else {
                header('HTTP/1.1 401 Unauthorized');
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Credenziali di accesso non valide']);
            }
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Errore interno del server']);
        }
    } else {
        header('HTTP/1.1 400 Bad Request');
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Richiesta non valida: dati JSON non corretti']);
    }
}

$mydb->close();
