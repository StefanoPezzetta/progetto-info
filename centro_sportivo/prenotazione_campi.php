<?php
session_start();
if($_SESSION["registrato"]==0){
    echo '<script>alert(EMAIL GIA IN USO);</script>';
}
else{
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

    <form action="calcio.php" method= "POST">
        <input type="submit" value = "calcio">
    </form>
    <form action="tennis.php" method = "POST">
        <input type="submit" value = "tennis">
    </form>
    <form action="padel.php" method = "post">
        <input type="submit" value = "padel.php">
    </form>
    <form action="calcetto.php" method = "POST">
        <input type="submit" value = "calcetto">
    </form>
</body>
</html>
<?php
}
?>
