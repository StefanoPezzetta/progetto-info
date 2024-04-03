<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calendario Interattivo</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
  }

  .container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
  }

  #calendario {
    border-collapse: collapse;
    width: 300px;
    margin: auto;
  }

  #calendario th,
  #calendario td {
    width: 40px;
    height: 40px;
    text-align: center;
    border: 1px solid #ddd;
  }

  #calendario th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  #calendario td {
    cursor: pointer;
  }

  #calendario td:hover {
    background-color: #f9f9f9;
  }

  .button-container {
    text-align: center;
    margin-top: 20px;
  }

  .button {
    padding: 10px 20px;
    margin: 0 5px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
  }

  .button:hover {
    background-color: #45a049;
  }

  .month-year {
    text-align: center;
    margin-bottom: 10px;
    font-size: 20px;
  }
</style>
</head>
<body>

<div class="container">
  <div class="month-year" id="monthYear"></div>
  <table id="calendario"></table>
  <div class="button-container">
    <button class="button" onclick="scorriMese(-1)">Indietro</button>
    <button class="button" onclick="scorriMese(1)">Avanti</button>
  </div>
</div>

<script>
  let annoCorrente, meseCorrente;
  const giorniNomi = ['Dom', 'Lun', 'Mar', 'Mer', 'Gio', 'Ven', 'Sab'];
  const tbody = document.querySelector('#calendario');
  const monthYearElement = document.querySelector('#monthYear');

  function creaCalendario(mese, anno) {
    const giorniNelMese = new Date(anno, mese + 1, 0).getDate();
    const primaGiornata = new Date(anno, mese, 1).getDay();

    let giorno = 1;
    let html = '<thead><tr>';
    for (let i = 0; i < 7; i++) {
      html += `<th>${giorniNomi[i]}</th>`;
    }
    html += '</tr></thead><tbody>';
    for (let i = 0; i < 6; i++) {
      html += '<tr>';
      for (let j = 0; j < 7; j++) {
        if (i === 0 && j < primaGiornata) {
          html += '<td></td>';
        } else if (giorno > giorniNelMese) {
          break;
        } else {
          html += `<td onclick="mostraData(${anno}, ${mese + 1}, ${giorno})">${giorno}</td>`;
          giorno++;
        }
      }
      html += '</tr>';
    }
    html += '</tbody>';
    tbody.innerHTML = html;

    // Aggiorna il testo del mese e dell'anno
    monthYearElement.textContent = `${meseNomi[mese]} ${anno}`;
  }

  function mostraData(anno, mese, giorno) {
    console.log(`${anno}`);
    alert(`Hai cliccato il ${anno}-${mese}-${giorno}`);

  }

  function scorriMese(delta) {
    meseCorrente += delta;
    if (meseCorrente < 0) {
      meseCorrente = 11;
      annoCorrente--;
    } else if (meseCorrente > 11) {
      meseCorrente = 0;
      annoCorrente++;
    }
    creaCalendario(meseCorrente, annoCorrente);
  }

  const oggi = new Date();
  annoCorrente = oggi.getFullYear();
  meseCorrente = oggi.getMonth();

  const meseNomi = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

  creaCalendario(meseCorrente, annoCorrente);
</script>

</body>
</html>