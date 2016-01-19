<?php
include 'connectDB.php';

$requete = "DELETE FROM ulysse.qcm WHERE `qcm`.`idQCM` =".$_SESSION["idQCM"];
$rows = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());

$requete="DELETE FROM ulysse.question WHERE idQCM =".$_SESSION["idQCM"];
$rows = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
          
