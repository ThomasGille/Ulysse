<?php

include_once 'CryptageMdp.php';
include_once 'connectBD.php';





$idPers = $_POST["id"];


if ($Crypt != null){
    
    // 1. Personne dans BD ?? 
    $requete="SELECT idPersonne FROM personne WHERE idPersonne = $idPers";
    $reqID = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
    
    if (reqID == null){
        echo "erreur";
    }else{
        echo "ID existant";
        // si etape 1. vrai : 
        // 
        // 2. Récupération Mdp de la personne
    $requete="SELECT Mdp FROM mdp WHERE idPersonne = $idPers ";
    $MDPHash = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
    
        // 3. Cryptage Mdp entré en connexion
    $Crypt = Cryptage($_POST["mdp"]);
    }
    
    if ($req == $idPers){
        
    }
    
    
}
