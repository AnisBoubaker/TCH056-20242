<?php

require_once(__DIR__."/../config.php");

$requete = $pdo->prepare("SELECT * FROM `postits`");
$requete->execute();

echo json_encode($requete->fetchAll());



?>