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
        <?php
        // put your code here
        include "Var.php";
        include "Menu.php";
        include "connectDB.php";
        
        
        ?>
        <form name="qcm" method="post" action="use_creaQuestion.php">

            Entrez un énoncé : <input type="text" name="nom" value=""  required>
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
    </body>
</html>