<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Création QCM</title>
    </head>
    <body>
        <?php
        session_start();
        include "Var.php";
        include "Menu.php";
        include "connectDB.php";

        echo '<form name="connect" method="post" action="use_creaQCM.php">
			
			Entrez un nom : <input type="text" name="nom" value=""  required> <br/>
			
			<br />
			<input type="submit" name="valider" value="Valider" />
			<input type="reset" name="reset" />
		</form>
		<br>';

        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            $_SESSION["msg"] = NULL;
        }
        ?>
    </body>
</html>