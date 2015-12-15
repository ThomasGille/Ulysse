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
	        // je suis une patate amnésique
	        $patate=NULL;
	        $test=1;
        

                //test cryptage
                $pswrd = "azerty";

                echo crypt($pswrd, password_hash($pswrd, PASSWORD_BCRYPT));



        ?>
    </body>
</html>
