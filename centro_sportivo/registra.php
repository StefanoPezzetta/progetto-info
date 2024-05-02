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
                <button class="registra" onclick = registrati()>Registrati</button>
            </div>
            <p class ="p">Sei già un utente? <a class ="accedi" href="login.php">Accedi</a></p>

    </div>
</body>
<a class="indietro" href="index.php"> <img src="https://img.icons8.com/ink/48/000000/undo.png"/></a>

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

        throw new Error(errorData.error);
    }

    const data = await response.json();

    if (data.success) {
        window.location.href = 'prenotazione_campi.php';
    } else {
        errore.innerHTML = 'Operazione fallita, per favore riprova.';
    }
} catch (error) {
    errore.innerHTML = error.message;
}
}
</script>
