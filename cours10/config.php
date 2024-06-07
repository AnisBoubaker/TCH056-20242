<?php
//Démarer la session pour pouvoir utiliser $_SESSION
session_start();

$hostname = "db";
$username = "user";
$password = "password";
$database = "mydatabase";

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", 
          $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, 
          PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
    echo "Connexion échouée: " . $e->getMessage();
  }


// $conn = new mysqli($hostname, $username, $password,$database);

// if ($conn->connect_error) {
//   die("Connexion échouée: " . $conn->connect_error);
// }
// echo "Connexion réussie";



?>