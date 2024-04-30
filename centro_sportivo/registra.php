<!-- <!DOCTYPE html>
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
        <p>Email già in uso</p>
        <button onclick="closePopup()">Close</button>
    </div>
    </div>
        <input type="text" name="email" id="email" placeholder="email">
        <br>
        <input type="text" name="pw" id="pw" placeholder="pw">
        <br>
        <input type="text" name="nome" id="nome" placeholder="nome">
        <br>
        <input type="text" name="cognome" id="cognome" placeholder="cognome">
        <br>
        <input type="date" id="data_nascita" name="data_nascita">
        <br>
        <div id = "errore"></div>
        <button onclick = registrati()>Conferma</button> 
      </table>
</body>
</html>
<script>
      async function registrati() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('pw').value;
    const nome = document.getElementById('nome').value;
    const cognome = document.getElementById('cognome').value;
    const data_nascita = document.getElementById('data_nascita').value;
    const errore = document.getElementById('errore');

    
    const dataToSend = {
        email: email,
        password: password,
        nome: nome,
        cognome: cognome,
        data_nascita: data_nascita,
    };

    try {
    // Effettua la richiesta HTTP POST al server
    const response = await fetch('registra_script.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dataToSend),
    });

    if (!response.ok) {
        // Leggi la risposta JSON
        const errorData = await response.json();

        // Controlla il codice di stato HTTP
        if (response.status === 400) {
            // Errore 400: Bad Request (email non valida)
            errore.innerHTML = 'Email non valida. Inserire mail valida.';
        } else if (response.status === 409) {
            // Errore 409: Conflict (email già in uso)
            errore.innerHTML = 'Email già in uso. Per favore, utilizza un\'altra email.';
        } else {
            // Altri errori (ad esempio, 500 Internal Server Error)
            errore.innerHTML = 'Si è verificato un errore. Per favore, riprova.';
        }

        // Lancia un'eccezione con il messaggio di errore
        throw new Error(errorData.error);
    }

    // Ottieni la risposta JSON
    const data = await response.json();

    // Gestisci il successo (accesso riuscito)
    if (data.success) {
        window.location.href = 'prenotazione_campi.php';
    } else {
        errore.innerHTML = 'Operazione fallita, per favore riprova.';
    }
} catch (error) {
    // Mostra il messaggio di errore all'utente
    errore.innerHTML = error.message;
}
}
</script>
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
</style> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="registrazione.css">
</head>
<body>
    <br><br><br>
    <h1 class="title">BOÈSPORTIVE CENTER</h1>
    <hr class="separatore">

    <div class="container">
    <a href="index.php" class="back-link">&#8592;</a>

    <a href="index.php">
    <img class ="logo" src="https://img.icons8.com/bubbles/100/pull-up-bar.png" /></a>
</a>



        <h2>Registrazione</h2>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
                <br>
                <label for="cognome">Cognome:</label>
                <input type="text" id="cognome" name="cognome" required>
                <br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
                <br>
                <label for="pw">Password:</label>
                <input type="password" id="pw" name="pw" required>
                <br>
                <label for="data_nascita">Data di nascita</label>
                <input type="date" id="data_nascita" name="data_nascita">

            </div>
            <div id = "errore" ></div>
            <div class="form-group">
                <button onclick = registrati()>Registrati</button>
            </div>
            <p class ="p">Sei già un utente? <a class ="accedi" href="login.php">Accedi</a></p>

    </div>
</body>
</html>
<script>
      async function registrati() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('pw').value;
    const nome = document.getElementById('nome').value;
    const cognome = document.getElementById('cognome').value;
    const data_nascita = document.getElementById('data_nascita').value;
    const errore = document.getElementById('errore');

    
    const dataToSend = {
        email: email,
        password: password,
        nome: nome,
        cognome: cognome,
        data_nascita: data_nascita,
    };

    try {
    // Effettua la richiesta HTTP POST al server
    const response = await fetch('registra_script.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dataToSend),
    });

    if (!response.ok) {
        // Leggi la risposta JSON
        const errorData = await response.json();

        // Controlla il codice di stato HTTP
        if (response.status === 400) {
            // Errore 400: Bad Request (email non valida)
            errore.innerHTML = 'Email non valida. Inserire mail valida.';
        } else if (response.status === 409) {
            // Errore 409: Conflict (email già in uso)
            errore.innerHTML = 'Email già in uso. Per favore, utilizza un\'altra email.';
        } else {
            // Altri errori (ad esempio, 500 Internal Server Error)
            errore.innerHTML = 'Si è verificato un errore. Per favore, riprova.';
        }

        // Lancia un'eccezione con il messaggio di errore
        throw new Error(errorData.error);
    }

    // Ottieni la risposta JSON
    const data = await response.json();

    // Gestisci il successo (accesso riuscito)
    if (data.success) {
        window.location.href = 'prenotazione_campi.php';
    } else {
        errore.innerHTML = 'Operazione fallita, per favore riprova.';
    }
} catch (error) {
    // Mostra il messaggio di errore all'utente
    errore.innerHTML = error.message;
}
}
</script>
