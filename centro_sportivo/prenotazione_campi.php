<?php
session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="prenotazione_campi.css">

</head>
<body>
    <h1>PRENOTA UN CAMPO</h1>

    <div class="card-container">
        <!-- Card per calcetto -->
        <div class="card">
            <img src="img/calcetto.jpg" alt="Calcetto">
            <h2 class = "titolo">Calcetto</h2>
            <button id="calcetto">Prenota Calcetto</button>
        </div>

        <!-- Card per tennis -->
        <div class="card">
            <img src="img/tennis.jpg" alt="Tennis">
            <h2 class = "titolo">Tennis</h2>
            <button id="tennis">Prenota Tennis</button>
        </div>

        <!-- Card per padel -->
        <div class="card">
            <img src="img/padel.jpg" alt="Padel">
            <h2 class = "titolo">Padel</h2>
            <button id="padel">Prenota Padel</button>
        </div>

        <!-- Card per calcio -->
        <div class="card">
            <img src="img/calcio.jpg" alt="Calcio">
            <h2 class = "titolo">Calcio</h2>
            <button id="calcio">Prenota Calcio</button>
        </div>

        <!-- Card per nuoto -->
        <div class="card">
            <img src="img/nuoto.jpg" alt="Nuoto">
            <h2 class = "titolo">Nuoto</h2>
            <button id="nuoto">Prenota Nuoto</button>
        </div>
    </div>
    <script>
    const calcetto = document.getElementById('calcetto');
    const tennis = document.getElementById('tennis');
    const padel = document.getElementById('padel');
    const calcio = document.getElementById('calcio');
    const nuoto = document.getElementById('nuoto');


    calcetto.addEventListener('click', () => sport('calcetto'));
    tennis.addEventListener('click', () => sport('tennis'));
    padel.addEventListener('click', () => sport('padel'));
    calcio.addEventListener('click', () => sport('calcio'));
    nuoto.addEventListener('click', () => sport('nuoto'));


    function sport(sport){
        console.log(`Esecuzione con variabile: ${sport}`);
        switch(sport){
            case 'calcetto':
                stringaJSON = JSON.stringify("calcetto");
                sessionStorage.setItem('sport', stringaJSON);
                break;
            case 'tennis':
                stringaJSON = JSON.stringify("tennis");
                sessionStorage.setItem('sport', stringaJSON);
                break;
            case 'padel':
                stringaJSON = JSON.stringify("padel");
                sessionStorage.setItem('sport', stringaJSON);
                break;
            case 'calcio':
                stringaJSON = JSON.stringify("calcio");
                sessionStorage.setItem('sport', stringaJSON);
                break;
            case 'nuoto':
                stringaJSON = JSON.stringify("nuoto");
                sessionStorage.setItem('sport', stringaJSON);
                break;
            default:
                console.log('Variabile non riconosciuta');
        }
        window.location.href = `cal.html`;

    }

    function logout() {
    const confermaLogout = confirm("Sei sicuro di voler effettuare il logout?");

    if (confermaLogout) {
        const url = 'logout.php';

        fetch(url)
            .then(response => {
                if (response.ok) {
                    console.log('Richiesta GET completata con successo');
                } else {
                    throw new Error(`Errore nella richiesta: ${response.status}`);
                }
            })
            .catch(error => {
                console.error('Errore:', error);
            });

        window.location.href = 'index.php';
    }
}
</script>
<a class="indietro" href="index.php"><img src="https://img.icons8.com/ink/48/000000/undo.png"/></a>
<button class="logout" onclick = logout()><img src="https://img.icons8.com/dusk/64/logout-rounded.png"/></button>
</body>
</html>


