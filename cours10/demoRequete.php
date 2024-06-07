<?php
require_once("./config.php");
$requete = $conn->prepare("SELECT * FROM postits WHERE id>= :idMin ");

$idMinimal = 4;
$requete->bindValue(":idMin", $idMinimal) ;
$requete->execute();

$idMinimal  = 2;
$requete->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Démonstration d'une requête</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>TITRE</th>
            <th>CONTENU</th>
        </tr>
        <?php
            while( $ligne = $requete->fetch() ){
                echo "<tr>";
                echo "<td>".$ligne["id"]."</td>";
                echo "<td>".$ligne["title"]."</td>";
                echo "<td>".$ligne["content"]."</td>";
                echo  "</tr>";
            }
        ?>
    </table>
    
</body>
</html>