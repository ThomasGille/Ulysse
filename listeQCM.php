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
        
        include_once "Var.php";
        include "Menu.php";
        include_once "connectDB.php";
        ?>
        
        <h1>QCM</h1>
        
        <?php 
        // On récupère tous les QCM et on les affiches
        //print_r(fetchQcm($link));
        $qcms = fetchQcm($link);
        afficheQcm($qcms);      

        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            $_SESSION["msg"] = NULL;
        }
        ?>
    </body>
</html>

<?php 

	function fetchQcm($linkDb) {

		//print_r($reponses) ; echo '<br />';
		
		$sql = "SELECT * FROM `qcm`";
		
		// Si la requête a réussi on récupère toutes les questions de la table
		if ( $result = mysqli_query( $linkDb, $sql ) ) {
				
			$rows = mysqli_fetch_all( $result, MYSQLI_ASSOC ) ;
			mysqli_free_result( $result ) ;
		
		}
		
		// Sinon affiche l'erreur
		else {

			$_SESSION["msg"] = mysqli_error($linkDb);
		}
		
		return $rows;
		
	}
	
	// On passe un tableau de question qui sont affiché
	function afficheQcm($qcms) {

		//print_r($questions); echo "<br />";
		
		//On affiche tous les QCM
		foreach( $qcms as $indexLigne => $qcm ) {
			
			// On passe l'id du QCM dans $_GET pour repondre au QCM
			echo '<a href="repondreQCM.php?idQCM='.$qcm["idQCM"].'">QCM '.$qcm["idQCM"].'<br />';
		
		}
	}
?>
