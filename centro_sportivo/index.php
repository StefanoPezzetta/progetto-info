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
    <header class="header">
        <p>+39 3331369344</p>
        <p> ༼ つ ◕_◕ ༽つ</p>

        <nav class="navbar">
            <p>centrosportivonome@gmail.com</p>
            <p>Privacy Policy</p>
        </nav>
    </header>
    <h1>CENTRO SPORTIVO</h1>
    <div class="via">
    <p>via: Paolo VI n°6 BOVEZZO</p>
    </div>
    <div class = "bottoni">
        <div class="accedi">
        <form action="login.php">
            <input type="submit" value = "accedi">
        </form>
        </div>
        <div class = "prenotazione">
            <form action="prenotazione_campi.php">
                <input type="submit" value = "prenota un campo">
            </form>    
        </div>
        <div class= "registrati">
        <form action="registra.php">
            <input type="submit" value = "registrati">
        </form>
        </div>
        
    
    <div class="informazioni">
        <a href="informazioni.php">Chi siamo?</a></body>
    </div>
    </div>
    
</html>
<style>
    body {
    background-image: url('img/home.jpg');
    background-size: cover; /* Adatta l'immagine per coprire l'intera area del corpo */
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-size: 24px;
}
h1 {
    position: absolute;
    top: 35px; /* Imposta la distanza dal top */
    left: 20px; /* Imposta la distanza dal left */
    color: white;
}

.via p {
    position: absolute;
    top: 90px; /* Sposta il testo "via" sotto "CENTRO SPORTIVO" */
    left: 40px; /* Imposta la distanza dal left */
    color: white;
}
.informazioni a{
    position: absolute;
    top: 120px; /* Sposta il testo "via" sotto "CENTRO SPORTIVO" */
    left: 40px; /* Imposta la distanza dal left */
    color: white;
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Contrail One", "Sans Serif";
}

.body{
  
  min-height:100vh;
  background-size: cover;
  background-position: center;

}
.header{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  padding: 1px ; 
  background: black;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 100;
  margin-bottom: 40PX;
  color: white;
  font-size: 14px; /* Riduci la dimensione del testo */


  
} 


.logo{
  font-size: 12px;
  color:red;
  text-decoration: none;
  font-weight: 700;
}
.logo span{
  font-size: 12px;
  color:white;
  text-decoration: none;
  font-weight: 700;
}
.navbar {
  padding: 2px; /* Riduci il padding */
}

.navbar p {
  color: white; /* Imposta il colore del testo su bianco */
  font-size: 14px;
  margin-left: 20px;
}



.navbar p::before{
  content: '';
  position: absolute;
  top: 100%;
  left: 0;
  width: 20px;
  height: 2px;
  background: #fff;
  transition: .3s;
  color: red;


}

.navbar p:hover:before{
  width: 100%;

}

.content {
  margin: 25px 0;
  border-collapse: collapse;
  font-size: 0.9em;
  width: 50%;
  min: width 400px;
  border-radius: 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0, 0.15);
  margin-left: 25%;
  
}
.accedi input{
    margin-bottom: 150px; /* Aggiungi spazio inferiore tra i pulsanti */
    margin-left: 350px;
    width: 200px; /* Imposta la larghezza del pulsante */
    height: 50px; /* Imposta l'altezza del pulsante */
    font-size: 18px; /* Aumenta la dimensione del testo */
}
.prenotazione input{
    margin-bottom: 100px; /* Aggiungi spazio inferiore tra i pulsanti */
    margin-left: 350px;
    width: 200px; /* Imposta la larghezza del pulsante */
    height: 50px; /* Imposta l'altezza del pulsante */
    font-size: 18px; /* Aumenta la dimensione del testo */
}


</style>