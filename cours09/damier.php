<?php

$demo = 15;

function creerDamier($debut){
    global $demo;
    echo "<table>";
    for($i=0; $i<10; $i++){
        echo "<tr>";
        for($j=0; $j<10; $j++){
            $valeur = $i * 10 + $j + $debut + $demo;
            $la_classe = ($i+$j) %2 == 0 ? "blanc" : "noir";
           echo "<td class='$la_classe'>".$valeur."</td>"; //Le point: operateur de concaténation
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Damier</title>
    <link rel="stylesheet" href="./damier.css" />
</head>
<body>
    <h1>Mon beau damier:</h1>

    <?php
    creerDamier(7);
    ?>






    <!-- <table>
    <?php
    for($i=0; $i<10; $i++){
        echo "<tr>";
        for($j=0; $j<10; $j++){
            $valeur = $i * 10 + $j + 1;

            // if(($i + $j) % 2 == 0){
            //     $la_classe = "blanc";
            // } else {
            //     $la_classe = "noir";
            // }

            $la_classe = ($i+$j) %2 == 0 ? "blanc" : "noir";

           // echo "<td>$valeur</td>";
           echo "<td class='$la_classe'>".$valeur."</td>"; //Le point: operateur de concaténation
        }
        echo "</tr>";
    }
    ?>
    </table> -->


    <!-- <table>
        <tr>
            <td class="blanc">1</td>
            <td class="noir">2</td>
            <td class="blanc">3</td>
            <td class="noir">4</td>
            <td class="blanc">5</td>
            <td class="noir">6</td>
            <td class="blanc">7</td>
            <td class="noir">8</td>
            <td class="blanc">9</td>
            <td class="noir">10</td>
        </tr>
        <tr>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
            <td>17</td>
            <td>18</td>
            <td>19</td>
            <td>20</td>
        </tr>
    </table> -->
</body>
</html>