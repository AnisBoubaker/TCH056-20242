<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page2</title>
</head>
<body>
    <?php
    echo  "La valeur de x est: ".$_SESSION["x"];
    ?>
</body>
</html>