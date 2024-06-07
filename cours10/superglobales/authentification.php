<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //Exécuter uniquement si on accède à la page après avoir soumis le formulaire
    if( isset($_POST["utilisateur"]) && isset($_POST["mot_passe"]) ){
        echo "Votre nom d'utilisateur est: ".$_REQUEST["utilisateur"]."<br />";
        echo "Votre mot de passe est: ".$_REQUEST["mot_passe"]."<br />";
        if($_POST["utilisateur"]=="toto" && $_POST["mot_passe"]!="tata"){
            echo "Code d'accès incorrect";
        }
    }
    ?>
    <form action="./authentification.php" method="post">
        <label for="utilisateur">Nom d'utilisateur:</label>
        <input type="text" name="utilisateur" id="utilisateur"><br />
        
        <label for="mot_passe">Mot de passe:</label>
        <input type="password" name="mot_passe" id="mot_passe"><br />

        <input type="submit" value="Connexion">
    </form>
</body>
</html>