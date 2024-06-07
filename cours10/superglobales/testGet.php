<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de GET</title>
</head>
<body>
   <p>Vous avez envoyé par GET les valeurs suivantes: </p>
    <ul>
        <li>id: <?= $_GET["id"]  ?></li>
        <li>user: <?= $_GET["user"] ?></li>
    </ul>
</body>
</html>