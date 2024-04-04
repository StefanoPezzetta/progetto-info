<?php
session_start();


?>
<script>
  // Funzione per aprire il popup
  function openPopup() {
    document.getElementById('popupOverlay').style.display = 'flex';
  }

  // Funzione per chiudere il popup
  function closePopup() {
    document.getElementById('popupOverlay').style.display = 'none';
  }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_SESSION["emailInUso"]==1){
/*         openPopup();
 */    }
    ?>
    <h1>INSERISCI LE TUE CREDENZIALI</h1>
    <table>        
    <div class="popup-overlay" id="popupOverlay">
    <div class="popup-content">
        <p>Email già in uso</p>
        <button onclick="closePopup()">Close</button>
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
    
</body>
<style>
  /* Stili per il popup */
  .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Trasparenza */
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Assicura che il popup sia al di sopra di tutti gli altri elementi */
  }

  .popup-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
  }
</style>
</html>
