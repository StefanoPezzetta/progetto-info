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
                // Stampa l'array di risposta nella console
                console.log(responseArray);
                const paragrafi = document.querySelectorAll('p');

                // Imposta il contenuto di ogni paragrafo a una stringa vuota
                paragrafi.forEach(paragrafo => {
                    paragrafo.innerHTML = '';
                });


                // Ciclo per ogni elemento dell'array di risposta
                responseArray.forEach(element => {
                    let id =element['id'];
                    const paragrafo = document.createElement('p');
                    paragrafo.innerHTML = "Giorno: " + element['giorno'] + ", Campo prenotato: " + element['nomeCampo'] + ", Dalle " + element['oraInizio'] + " alle " + element['oraFine'];

                    // Crea un pulsante
                    const pulsante = document.createElement('button');
                    pulsante.innerText = "Elimina";
                    
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
                    'Content-Type': 'application/json', // Specifica il tipo di contenuto come JSON
                    // Altri eventuali header necessari possono essere aggiunti qui
                },
                body: JSON.stringify(dataToSend), // Converte i dati in formato JSON
            });

            // Gestione degli errori HTTP
            if (!response.ok) {
                throw new Error(`Errore durante la richiesta al server. Codice di stato: ${response.status}`);
            } 

            getData();

             } catch (error) {
            console.error('Errore nella fetch:', error.message);
            } 

        } 
    

getData();
    
    </script>
</body>
</html>