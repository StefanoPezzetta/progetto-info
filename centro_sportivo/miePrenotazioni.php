<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>Le tue prenotazioni</h1>
</head>
<body>
    <script>
        async function getData(){
            const url = 'getUserPrenotation.php';

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Errore HTTP: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error('Si è verificato un errore:', error);
                });

        }



        /* function createPage(dataGiorno){
            let responseData = "";
            // Recupera i dati memorizzati nel sessionStorage
            const responseArrayJSON = sessionStorage.getItem('responseArray');
            const responseArray = JSON.parse(responseArrayJSON);
            
            // Fai qualcosa con i dati...
            console.log(responseArray);
            console.log(dataGiorno);

            responseArray.forEach(element => {
                // Crea un paragrafo per visualizzare i dettagli della prenotazione, incluso l'ID
                const paragrafo = document.createElement('p');
                paragrafo.innerHTML = "Campo prenotato: " + element['nomeCampo'] + " dalle " + element['oraInizio'] + " alle " + element['oraFine'];

                // Crea un pulsante elimina
                const eliminaButton = document.createElement('button');
                eliminaButton.innerText = "Elimina";

                // Assegna un evento onclick al pulsante
                // Utilizza una funzione freccia per passare i parametri a eliminaPrenotazione
                eliminaButton.onclick = () => {
                    eliminaPrenotazione(element['id'], dataGiorno);
                };

                // Aggiungi il pulsante al paragrafo
                paragrafo.appendChild(eliminaButton);

                // Aggiungi il paragrafo al documento
                document.body.appendChild(paragrafo);
            });

            // Utilizza una promessa per garantire l'esecuzione di popolaOrari dopo il completamento del forEach
            new Promise((resolve, reject) => {
                // Esegui il resolve() dopo aver completato il forEach
                resolve();
            }).then(() => {
                // Esegui popolaOrari(dataGiorno) dopo il completamento del forEach
                popolaOrari(dataGiorno);
        });
    }


    async function eliminaPrenotazione(id, dataGiorno){
            const dataToSend = {
                id: id,
            }
            
            console.log(dataToSend);

            try {
            const response = await fetch('deletePrenotazione.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Specifica il tipo di contenuto come JSON
                    // Altri eventuali header necessari possono essere aggiunti qui
                },
                body: JSON.stringify(dataToSend), // Converte i dati in formato JSON
            });

            // Gestione degli errori HTTP
            if (!response.ok) {
                throw new Error(`Errore durante la richiesta al server. Codice di stato: ${response.status}`);
            } 

            reciveDataFromServer(dataGiorno);

             } catch (error) {
            console.error('Errore nella fetch:', error.message);
            } 

        } */
    

getData();
    
    </script>
</body>
</html>