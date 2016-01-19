<?php


 $requete = "SELECT idPersonne FROM ulysse.qcm WHERE idQCM =".$_GET["idQCM"];
 $rows = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
  
  if (isset($_SESSION ["idPersonne"]) == $rows[0]){
      
    $requete = "DELETE FROM ulysse.qcm WHERE `qcm`.`idQCM` =".$_SESSION["idQCM"];
    $rows = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
  }