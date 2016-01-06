<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <h1> QCM n°
            <?php
            include "connectDB.php";
            echo $_SESSION["idQCM"];
            ?></h1>
        <?php
        $sql = "SELECT * FROM `question` where idQCM like \"" . $_SESSION["idQCM"] . "\" ";
        //echo $sql;
        // on envoie la requête
        $req = mysqli_query($link, $sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
        // on recupere la ligne 0 du resultat dans $data
        $data2 = mysqli_fetch_assoc($req);
        print_r($data2);
        
        ?>
        <br />
        <a href="CreaQuestion.php">Ajouter une question</a><br />
        <a href="index.php">Sauvegarder et partir</a><br />
    </body>
</html>
