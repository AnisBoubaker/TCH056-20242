<?php
require_once('./config.php');

//Si l'utilisateur est déjà connecté, on le renvoie directement vers la page index.php
if( isset($_SESSION["user_loggedin"]) ){
  header("Location: index.php");
  exit();
}

$nbErrors = 0;
$errMessage = "";

if( isset($_POST["username"]) && isset($_POST["password"])){
  // Le formulaire a été soumis => Traiter l'autrhentification

  //On vérifie si l'utilisateur existe dans la base de données
  $requete = $conn->prepare("SELECT * FROM `users` WHERE `username`=:username AND `password`=PASSWORD(:password)");
  $requete->bindParam(":username", $_POST["username"]);
  $requete->bindParam(":password", $_POST["password"]);
  $requete->execute();

  if($requete->fetch()){
    $_SESSION["user_loggedin"] = $_POST["username"];
    header("Location: index.php");
    exit();
  } else {
    $nbErrors++;
    $errMessage = "Code d'accès incorrects";
  }

}


?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Babillard de Post-its Électroniques</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./styles.css" />
  </head>
  <body>
    <header class="bg-primary text-white text-center py-3">
      <h1>Babillard de Post-its Électroniques</h1>
    </header>

    <div class="container my-4">
      <section id="authentification" class="mb-4">
        <h2>Authentification</h2>
        <?php
        if($nbErrors > 0 ){
          echo "<div class='alert alert-danger'>$errMessage</div>";
        }
        ?>
        
        <form id="loginForm" class="form-group" action="./login.php" method="post">
          <label for="username">Nom d'utilisateur:</label>
          <input
            type="text"
            id="username"
            name="username"
            class="form-control"
            value="<?= isset($_POST["username"]) ? $_POST["username"] : "" ?>"
            required
          />

          <label for="password">Mot de passe:</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            required
          />

          <button type="submit" class="btn btn-primary mt-2 .align-top">
            Se connecter
          </button>
          <button
            class="btn btn-secondary mt-2"
            onclick="window.location.href='./nouvelUsager.php';"
          >
            Créer un compte
          </button>
        </form>
      </section>
    </div>

    <footer class="bg-primary text-white text-center py-3 fixed-bottom">
      <p>&copy; 2024 Babillard de Post-its Électroniques</p>
    </footer>
  </body>
</html>
