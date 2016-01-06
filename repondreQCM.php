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
        
        include "Var.php";
        include "Menu.php";
        include "connectDB.php";
        
        // On récupère toutes les questions
        afficheQuestions($link, fetchQuestions($link, 2));
        
        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            $_SESSION["msg"] = NULL;
        }
        ?>
    </body>
</html>

<?php 

	function fetchQuestions($linkDb, $idQCM) {

		//print_r($reponses) ; echo '<br />';
		
		$sql = "SELECT * FROM `question` WHERE `idQCM` LIKE ".$idQCM;
		
		// Si la requête a réussi on récupère toutes les questions de la table
		if ( $result = mysqli_query( $linkDb, $sql ) ) {
				
			$rows = mysqli_fetch_all( $result, MYSQLI_ASSOC ) ;
			mysqli_free_result( $result ) ;
		
		}
		
		// Sinon affiche l'erreur
		else {

			echo mysqli_error($linkDb) ; echo '<br />' ;
		}
		
		return $rows;
		
	}
	
	// Récupère les réponses d'une question
	function fetchReponses($linkDb, $idQuestion) {

		$sql = "SELECT `enonceReponse` FROM `reponse` WHERE `idQuestion` LIKE ".$idQuestion;
		
		// Si la requête a réussi on récupère toutes les questions de la table
		if ( $result = mysqli_query( $linkDb, $sql ) ) {
				
			// Compte le nombre de réponses
			//echo mysqli_num_rows($result)."<br />";
			$rows = mysqli_fetch_all( $result, MYSQLI_ASSOC ) ;
			mysqli_free_result( $result ) ;
		
			return $rows;
		
		}
		
		// Sinon affiche l'erreur
		else {

			echo mysqli_error($linkDb) ; echo '<br />' ;
		}
		
		
	}
	
	// On passe un tableau de question qui sont affiché
	function afficheQuestions($linkDb, $questions) {

		//print_r($questions);
		// On parcourt chaque lignes
		foreach( $questions as $id => $question ) {
			
			// On parcourt chaque colonnes
			foreach( $question as $cle => $champ ) {
				echo $champ." ";						
			}
			
			echo "<br />";
			
			//echo "id = ".$id."<br />";
			
			//fetchReponses($linkDb, $id)
			afficheReponses(fetchReponses($linkDb, 2) );
			
			echo "<br />";
		}
		

	}
	
	function afficheReponses($reponses) {
	
		//print_r($reponses) ; echo '<br />';
		
		// On parcourt chaque lignes
		foreach( $reponses as $id => $reponse ) {
				
			// On parcourt chaque colonnes
			foreach( $reponse as $cle => $champ ) {
				
				echo '<input type="checkbox" name = '.$id.'" value="" />'.$champ.'<br />';
			}
				
			echo "<br />";
		}
	
	}
?>
