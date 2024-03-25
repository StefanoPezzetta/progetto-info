<script>
    const monthaYearElement = document.getElementById("monthYear");
    const datesElement = document.getElementById("dates");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    let currentDate = new Date();

    const updateCalendar = () => {
        const currentDate = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();

        const firstDay = new Date(currentyear, currentMonth, 0)
    }

</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class = "calendar">
        <div class = "header">
            <button id = "prevBtn">
                <i class = "fa-solid fa-chevron-left"></i>
            </button>
            <div class="monthYear" id = "monthYear"></div>
            <button id = "nextbtn">
                <i class = "fa-solid fa-chevron-left"></i>
            </button>
        </div>
        <div class="days">
            <div class="day">Lun</div>
            <div class="day">Mar</div>
            <div class="day">Mer</div>
            <div class="day">Gio</div>
            <div class="day">Ven</div>
            <div class="day">Sab</div>
            <div class="day">Dom</div>
        </div>
        <div class="dates" id="dates"></div>
    </div>
</body>
</html>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sens-serif;
    }
    body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #6f97c4;
    }
    .calendar{
        width: 380px;
        height: auto;
        display: flex;
        flex-direction: column;
        padding: 10px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    .header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }
    .header button{
        display: flex;
        align-items: center;
        border: none;
        border-radius: 50%;
        background: #fff;
        cursor: pointer;
        width: 40px;
        height: 40px;
        box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
    }
    .days{
        display: grid;
        grid-template-columns: repeat(7,1fr);
    }
    .day{
        text-align: center;
        padding: 5px;
        color: #999FA6;
    }
</style>