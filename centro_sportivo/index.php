<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CENTRO SPORTIVO</h1>
    <p>via: </p>
    <p>Recapito telefonico: </p>
    <form action="login.php">
        <input type="submit" value = "accedi">
    </form>
    <form action="registra.php">
        <input type="submit" value = "registrati">
    </form>
    <form action="prenotazione_campi.php">
        <input type="submit" value = "prenota un campo">
    </form>
    <a href="informazioni.php">Chi siamo?</a></body>
</html>