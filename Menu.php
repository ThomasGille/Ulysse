<?php
		include_once 'Var.php';
		?>
		
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		 <link rel="stylesheet" href="style.css" /> 
        <title></title>
    </head>
		
   
        
		
<?php

        if (isset($_SESSION ["idPersonne"])){
                if ($_SESSION ["idPersonne"] >=1000){
                        ?>
                        <html> 
                                <ul id="menu-demo2">
                                        <li><a href="#">Accueil</a></li>
                                        <li><a href="#">QCM</a>
                                                <ul>
                                                        <li><a href="CreaQCM.php">Création</a></li>
                                                        <li><a href="listeQCM.php">Consultation</a></li></li>

                                                </ul>
                                        <li><a href="Logout.php">Logout</a></li>
                                        <li><a href="index.php"><?php echo $_SESSION['prenomPersonne'] ?></a></li>
                                </ul>
                        </html>
                <?php
                }
                else{
                ?>
                <html>
                        <ul id="menu-demo2">
                                <li><a href="#">Accueil</a></li>
                                <li><a href="repondreQCM.php">Répondre QCM</a></li>
                                <li><a href="Logout.php">Logout</a></li>
                                <li><a href="index.php"><?php echo  $_SESSION['prenomPersonne'] ?></a></li>
                        </ul>

                </html>
        <?php
                }
        }
        else{
                ?>
                <html>
                        <ul id="menu-demo2">
                                <li><a href="index.php">Acceuil</a><br/></li>
                                <li><a href="Login.php">Login</a><br/></li>
                        </ul>
                </html>
        <?php
        }			
        ?>
		
        
		
	 <body>
		<p> 
		Page d'acceuil avec plein de trucs ecrits,<br> qui sont super cool <br>et super interessants !! <br>
		</p>
	 
    </body>
</html>
