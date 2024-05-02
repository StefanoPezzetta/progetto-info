<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>Le tue prenotazioni</h1>
    <link rel="stylesheet" href="miePrenotazioni.css">

</head>
<body>
    <button class="logout" onclick = logout()><img src="https://img.icons8.com/dusk/64/logout-rounded.png"/></button>

    <script>
        async function getData(){
            const url = 'getUserPrenotation.php';


                fetch(url)
                .then(response => {
                    if (!response.ok) {
                    throw new Error(`Errore nella richiesta: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                    if (data.length === 0) {
                console.log('Non sono presenti prenotazioni a tuo carico');
            }else{
                createPage(data);
            }
                })
                .catch(error => {
                    const messageElement = document.createElement('p');
                    messageElement.innerHTML = 'Non sono presenti prenotazioni a tuo carico.';
                    document.body.appendChild(messageElement);
                    console.error('Si è verificato un errore:', error);
                });
            }
            function createPage(responseArray) {
                console.log(responseArray);
                const paragrafi = document.querySelectorAll('p');

                paragrafi.forEach(paragrafo => {
                    paragrafo.remove();
                });


                responseArray.forEach(element => {
                    let id =element['id'];
                    const paragrafo = document.createElement('p');
                    paragrafo.innerHTML = "Giorno: " + element['giorno'] + ", Campo prenotato: " + element['nomeCampo'] + ", Dalle " + element['oraInizio'] + " alle " + element['oraFine'];

                    const pulsante = document.createElement('button');
                    pulsante.className = "elimina"; 

                    const immagine = document.createElement('img');
                    immagine.src = 'https://img.icons8.com/doodle/48/full-trash.png'; 

                    pulsante.appendChild(immagine);

                    pulsante.addEventListener('click', () => {
                        eliminaPrenotazione(id);
                    });

                    paragrafo.appendChild(pulsante);

                    document.body.appendChild(paragrafo);
                });

                
            }


  

    async function eliminaPrenotazione(id){
            const dataToSend = {
                id: id,
            }
            
            console.log(dataToSend);

            try {
            const response = await fetch('deletePrenotazione.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', 
                },
                body: JSON.stringify(dataToSend), 
            });

            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                let responseData = await response.json();
                console.log("pisello");
                console.log(responseData);


                let responseArrayJSON = sessionStorage.getItem('responseArray');
                let responseArray = JSON.parse(responseArrayJSON);

                const idsInResponseData = new Set();

                responseData.forEach(item => {
                    if (item.hasOwnProperty('id')) {
                        idsInResponseData.add(item.id); 
                    }
                });

                const filteredResponseArray = responseArray.filter(item => {
                    if (item.hasOwnProperty('id')) { 
                        return !idsInResponseData.has(item.id);
                    }
                });

                console.log(filteredResponseArray);
                stringaJSON = JSON.stringify(filteredResponseArray);
                sessionStorage.setItem('responseArray', stringaJSON);

                
            }
            if (!response.ok) {
                throw new Error(`Errore durante la richiesta al server. Codice di stato: ${response.status}`);
            } 

            getData();

             } catch (error) {
            console.error('Errore nella fetch:', error.message);
            } 

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
    

        getData();
    
    </script>
    <a class="indietro" href="prenotazioni.html"> <img src="https://img.icons8.com/ink/48/000000/undo.png"/></a>
</body>
</html>