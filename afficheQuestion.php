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
        $questions = fetchQuestions($link);
        afficheQuestions($questions);

        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            $_SESSION["msg"] = NULL;
        }
        ?>
    </body>
</html>

<?php 

	function fetchQuestions($id) {

		$sql = "SELECT * FROM `question`";
		
		// Si la requête a réussi on récupère toutes les questions de la table
		if ( $result = mysqli_query( $id, $sql ) ) {
				
			$rows = mysqli_fetch_all( $result, MYSQLI_ASSOC ) ;
			mysqli_free_result( $result ) ;
		
		}
		
		// Sinon affiche l'erreur
		else {

			echo mysqli_error($id) ; echo '<br />' ;
		}
		
		return $rows;
		
	}
	
	// On passe un tableau de question qui sont affiché
	function afficheQuestions($questions) {

		//print_r($questions);
				

	}
?>
