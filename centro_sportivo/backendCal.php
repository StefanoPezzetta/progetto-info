<?php
session_start();
require("config.php"); //parametri di connessione
$mydb = new mysqli(SERVER, UTENTE, PASSWORD, DATABASE);
if ($mydb->connect_errno) {
    echo "Errore nella connessione a MySQL: (" . $mydb->connect_errno . ") " . $mydb->connect_error;
    exit();
}
$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['anno']) && isset($data['mese']) && isset($data['giorno'])) {
    $anno = $data['anno'];
    $mese = $data['mese'];
    $giorno = $data['giorno'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>POPUP</p>
    <p><?php echo $anno?></p>
</body>
</html>