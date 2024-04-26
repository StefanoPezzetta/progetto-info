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
    <h1>PRENOTA UN CAMPO</h1>

    <button id="calcetto">Calcetto</button>
    <button id="tennis">Tennis</button>
    <button id="padel">Padel</button>
    <button id="calcio">Calcio</button>
    <button id="nuoto">Nuoto</button>

</body>
</html>
<script>
    const calcetto = document.getElementById('calcetto');
    const tennis = document.getElementById('tennis');
    const padel = document.getElementById('padel');
    const calcio = document.getElementById('calcio');
    const nuoto = document.getElementById('nuoto');


    // Aggiungi event listener ai pulsanti
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

</script>

