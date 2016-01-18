<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" href="style2.css" /> 
        <title>Création QCM</title>
    </head>
    <body>
        <?php
        
        include "Menu.php";
        include "connectDB.php";
        ?>
        
        <h1> Création QCM </h1>
        <p><div id="texte">
        <form name="qcm" method="post" action="use_creaQCM.php">

            Entrez un nom : <input type="text" name="nom" value=""  required>
            <br/>
            <br />
            <input type="submit" name="valider" value="Valider" />
            <input type="reset" name="reset" />
        </form>
        <br>

        <?php
        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            $_SESSION["msg"] = NULL;
        }
        ?>
        </div></p>
    </body>
</html>
<?php include "footer.php"; 
