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
        <a href="CreaQuestion.php">Ajouter une question</a><br />
        <a href="index.php">Partir</a><br />
    </body>
</html>
