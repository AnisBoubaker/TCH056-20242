<?php

require_once(__DIR__."/../config.php");

//On recupere le contenu du Body envoye dans la requete POST
$body = json_decode(file_get_contents("php://input"));

//On effectue l insertion
$requete = $pdo->prepare("INSERT INTO `postits` (`title`,`content`) VALUES (:title, :content)");
$requete->bindParam(":title", $body->title);
$requete->execute(":content", $body->content);
$requete->execute();

//On recupere l id du postit insere
$id = $pdo->mysqlInsertId();

//On recupere le postit et on le renvoie dans la reponse
$requete = $pdo->prepare("SELECT * FROM `postits` WHERE `id`=:id");
$requete->bindParam(":id", $id);
$requete->execute();

echo json_encode($requete->fetch());

?>