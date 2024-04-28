
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INSERISCI LE TUE CREDENZIALI</h1>
        <input type="text" name="email" id="email" placeholder="email">
        <input type="text" name="pw" id="pw" placeholder="pw">
        <button onclick="login()">Conferma</button>
        <div id = "errore"></div>
</body>
</html>
<script>
async function login() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('pw').value;
    const errore = document.getElementById('errore');

    
    const dataToSend = {
        email: email,
        password: password,
    };
    
    console.log(dataToSend);
    
    try {
        const response = await fetch('login_script.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToSend),
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.error);
        }

        const data = await response.json();
        console.log('Accesso riuscito:', data);
        window.location.href = 'prenotazione_campi.php'; // Reindirizza alla home page
    } catch (error) {
        console.error('Errore di autenticazione:', error.message);
        errore.innerHTML = "email o password errate";
    }
}
</script>