<?php
session_start();
if( ! isset($_SESSION["nombre_visites"])){
    $_SESSION["nombre_visites"] = 0;
}

$_SESSION["nombre_visites"]++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compteur</title>
</head>
<body>
    Vous avez visité cette page <?= $_SESSION["nombre_visites"] ?>  fois. 
</body>
</html>