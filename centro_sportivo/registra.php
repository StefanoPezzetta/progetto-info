<?php
session_start();
$errorMessage = "";
if(isset($_SESSION['emailInUso']) && $_SESSION['emailInUso'] == 1) {
    // Se è impostato a 1, mostra il messaggio di errore
    $errorMessage = "<p>Email già in uso</p>";
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
    <h1>INSERISCI LE TUE CREDENZIALI</h1>
    <table>        
    <div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
    </div>
    </div>
    <form action="registra_script.php" method="POST">
        <input type="text" name="mail" id="mail" placeholder="mail">
        <br>
        <input type="text" name="pw" id="pw" placeholder="pw">
        <br>
        <input type="text" name="nome" id="nome" placeholder="nome">
        <br>
        <input type="text" name="cognome" id="cognome" placeholder="cognome">
        <br>
        <input type="date" id="data_nascita" name="data_nascita">
        <br>
        <input type="submit" value="conferma">
    </form>
    </table>
    <?php echo $errorMessage; ?>
    
</body>
</html>
