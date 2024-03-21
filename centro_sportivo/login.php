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
    <h1>INSERISCI LE TUE CREDENZIALI</h1>
    <form action="registra_script.php" method="POST">
        <input type="text" name="mail" id="mail" placeholder="mail">
        <input type="text" name="password" id="password" placeholder="pw">
        <input type="submit" value="conferma">
    </form>
</body>
</html>