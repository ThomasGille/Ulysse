<?php
include "connectDB.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nbQuestion=0;
$nbJuste=0;
foreach( $_SESSION[$Rep] as $indexLigne => $reponse ) {
    $Id=$reponse["Id"];
    $data=  \fetchReponses($Id, $link); //récupération des réponses justes
    var_dump($data);
    $string="";
    foreach ($data as $indexRep => $rep){//cr"ation du mot bianaire des rep justes
        $string.=$data["juste"];
    }
    if(strcmp($string,$reponse["R"])){// comparaison avec les réponses users
        echo "Réponse juste à la question ".$Id;
        $nbJuste++;
    }
    else {
        echo "Réponse fausse à la question ".$Id;
    }
    $nbQuestion++;
}
//insertion dans la bd du résultat
$note=round(($nbJuste/$nbQuestion)*100, 0);
///////////// insertion question
$sql = "INSERT INTO `resultat` VALUES (\"" . $_SESSION["idQCM"] . "\", \"" . $_SESSION["idPersonne"] . "\",".$note.");";

if (mysqli_query($link, $sql)) {
    // On redirige le visiteur vers la page création de question
    echo 'question insérée <br />';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


function fetchReponses($Id,$link) {

		//print_r($reponses) ; echo '<br />';
		
		$sql = "SELECT juste FROM `reponse` where idQuestion like  \"" . $Id . "\" ";
		
		// Si la requête a réussi on récupère toutes les questions de la table
		if ( $result = mysqli_query( $link, $sql ) ) {
				
			$rows = mysqli_fetch_all( $result, MYSQLI_ASSOC ) ;
			mysqli_free_result( $result ) ;
		
		}
		
		// Sinon affiche l'erreur
		else {

			$_SESSION["msg"] = mysqli_error($link);
		}
		
		return $rows;
		
	}
