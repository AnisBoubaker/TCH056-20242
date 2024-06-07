<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page1</title>
</head>
<body>
    <?php
        $_SESSION["x"] = 10;
        echo "La valeur de x est : ".$_SESSION["x"];
    ?>
    <br />
    <a href="./page2.php">Lien vers page2</a>

</body>
</html>