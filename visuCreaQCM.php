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

        <h1> QCM n°
            <?php
            include "connectDB.php";
            echo $_SESSION["idQCM"];
            ?></h1>
        <?php
        
            $qcms = fetchQuestion($link);
            //var_dump($qcms);
            //afficheQcm($qcms);  
            afficheQuestion($qcms,$link);
        ?>
        <br />
        <a href="CreaQuestion.php">Ajouter une question</a><br />
        <a href="index.php">Sauvegarder et partir</a><br />
    </body>
    
</html>

<?php 

	function fetchQuestion($link) {

		//print_r($reponses) ; echo '<br />';
		
		$sql = "SELECT * FROM `question` where idQCM like \"" . $_SESSION["idQCM"] . "\" ";
		
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
        
        function fetchReponses($link) {

		//print_r($reponses) ; echo '<br />';
		
		$sql = "SELECT * FROM `reponse` where idQuestion like \"" . $_SESSION["idQuestion"] . "\" ";
		
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
	
	// On passe un tableau de question qui sont affiché
	function afficheQuestion($qcms,$link) {

		//print_r($questions); echo "<br />";
		
		//On affiche tous les QCM
		foreach( $qcms as $indexLigne => $question ) {
			
			// On passe l'id du QCM dans $_GET pour repondre au QCM
			echo $question["enonceQuestion"].'<br />';
                        $_SESSION["idQuestion"]=$question["idQuestion"];
                        
                        $rep = fetchReponses($link);
                        foreach( $rep as $indexLigne => $reponses ) {
                            echo $reponses["enonceReponse"].'<br />';
                        }
		
		}
	}
?>
