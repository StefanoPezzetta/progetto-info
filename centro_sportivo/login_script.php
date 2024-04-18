<?php
session_start();
require("config.php"); //parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}
    
    
        $email = $_POST["mail"];
        $pw = $_POST["password"];  

        $stmt = $mydb->prepare("SELECT pw FROM utente WHERE mail = ?");
        $stmt->bind_param("s", $email);
        
        if ($stmt->execute()) {
            $stmt->bind_result($hash);
            $stmt->fetch();
            $stmt->close();

            if ($hash !== null && password_verify($pw, $hash)==true) {
                $stmt2 = $mydb->prepare("SELECT id FROM utente WHERE mail = ?");
                $stmt2->bind_param("s", $email);
                $stmt2->execute();
                $stmt2->bind_result($user);
                $stmt2->fetch();
                $stmt2->close();
                $_SESSION["user"]=$user;
                header("Location: prenotazione_campi.php");
            }
        } else {
            //Riportare errore     
        }
    

    // Invia la risposta JSON solo dopo il completamento delle operazioni
?>