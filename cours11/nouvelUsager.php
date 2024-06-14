<?php
require_once('./config.php');

$formulaireSoumis = false;
$erreur = "";
$nbErreurs = 0;
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"])){
  $formulaireSoumis = true;

  //Vérifier si le username est déjà utilisé
  $requete = $conn->prepare("SELECT * FROM `users` WHERE `username`=:username");
  $requete->bindValue(":username", $_POST["username"]);
  $requete->execute();

  if($requete->fetch()){
    $nbErreurs ++;
    $erreur = "Le nom d'utilisateur existe déjà!";
  }

  if(!$nbErreurs){
    $requete = $conn->prepare("INSERT INTO `users` (`username`, `password`, `email`) VALUES (:username, PASSWORD(:pass), :email )");
    $requete->bindValue(":username", $_POST["username"]);
    $requete->bindValue(":pass", $_POST["password"]);
    $requete->bindValue(":email", $_POST["email"]);
    if( $requete->execute() ){
      //Renvoyer l'usager vers la page login.php
      header("Location: login.php");
      exit();
    } else {
      $nbErreurs++;
      $erreur = $erreur . "Erreur lors de l'insertion dans la base de données.";
    }

    
  }

}

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Inscription</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./styles.css?val=1" />
  </head>
  <body>
    <header class="bg-primary text-white text-center py-3">
      <h1>Inscription</h1>
    </header>

    <div class="container my-4">
      <section id="nouvelUsager" class="mb-4">
        <h2>Créer un compte</h2>
        
          <?php
          //On affiche les erreurs éventuelles
          if($nbErreurs){
            echo "<div class='alert alert-danger'>";
            echo $erreur;
            echo "</div>";
          }
          ?>
        <form method="post" action="./nouvelUsager.php">
          <div class="form-group">
            <label for="username">Nom d'utilisateur:</label>
            <input
              type="text"
              id="username"
              name="username"
              class="form-control"
              required
            />
          </div>

          <div class="form-group">
            <label for="email">Courriel:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              required
            />
          </div>

          <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control"
              required
            />
          </div>

          <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
      </section>
    </div>

    <footer class="bg-primary text-white text-center py-3 fixed-bottom">
      <p>&copy; 2024 Babillard de Post-its Électroniques</p>
    </footer>
  </body>
</html>
