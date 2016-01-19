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
        <title></title>
    </head>
    <?php
        // put your code here
        include "Var.php";
        include "Menu.php";
        include "connectDB.php";
        
        if ( ! isset($_SESSION ["idPersonne"])){
        	header("Location:index.php");
        }
        
        ?>
    <body>
        <p><div id="texte">
        
        <form name="qcm" method="post" action="use_creaQuestion.php">

            Entrez un énoncé : <input type="text" name="question" value="" size="50" required>
            <br/><br/>
            a : <input type="text" name="rep1" value=""  required>
            True? <input type="checkbox" name="cha"  /><br/>
            b : <input type="text" name="rep2" value=""  required>
            True? <input type="checkbox" name="chb"  /><br/>
            c : <input type="text" name="rep3" value=""  required>
            True? <input type="checkbox" name="chc"  /><br/>
            d : <input type="text" name="rep4" value=""  required>
            True? <input type="checkbox" name="chd"  /><br/>
            
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
