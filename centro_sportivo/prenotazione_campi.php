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

    <form action="calcioCal.php" method= "POST">
        <input type="submit" value = "calcio">
    </form>
    <form action="tennisCal.php" method = "POST">
        <input type="submit" value = "tennis">
    </form>
    <form action="padelCal.php" method = "post">
        <input type="submit" value = "padel">
    </form>
    <form action="calcettoCal.php" method = "POST">
        <input type="submit" value = "calcetto">
    </form>
</body>
</html>
<?php

?>
