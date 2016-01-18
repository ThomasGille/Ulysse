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
        
		// Prise en charge des erreurs
        verifQcm($link);
        
        $idQCM = $_GET["idQCM"];
        $_SESSION["idQCM"] = $_GET["idQCM"];
        //$_SESSION["questionCourante"] = 1 ;
        ?>
                
        <h1>QCM <?php echo $idQCM ;?></h1>
                
       <?php 
       	// On récupère toutes les questions
       $question = fetchQuestions($link, $idQCM);
       afficheQuestions($link, fetchQuestions($link, $idQCM));
       
       
       print_r(fetchQuestions($link, $_SESSION["idQCM"]));
                
        if (isset($_SESSION["msg"])) {
 			echo $_SESSION["msg"];
  			$_SESSION["msg"] = NULL;
     	  }
  	  ?>
    </body>
</html>

<?php 


	function verifQcm($linkDb) {
		
		// Si on accède à la page sans passer par la liste des QCM, rediriger vers celle-ci.
		if( ! isset($_GET["idQCM"]) ) {
			header( "Location:listeQCM.php");
		}
		
		// Erreur et redirection vers la liste si le QCM n'existe pas
		$sql = "SELECT `idQcm` FROM `question` WHERE `idQCM` LIKE ".$_GET["idQCM"];
		
		// Si la requête a réussi on récupère toutes les questions de la table
		if ( $result = mysqli_query( $linkDb, $sql ) ) {
		
			// Compte le nombre de réponses
			if (mysqli_num_rows($result) < 1) {
				
				$_SESSION["msg"] = "Erreur, le QCM demandé n'existe pas <br />";
				header( "Location:listeQCM.php");
			}
			mysqli_free_result( $result ) ;
		
			//return $rows;
		
		}
		
		// Sinon affiche l'erreur
			else {
		
				$_SESSION["msg"] = mysqli_error($linkDb) ;
			}
	}

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

			$_SESSION["msg"] = mysqli_error($linkDb);
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

			$_SESSION["msg"] = mysqli_error($linkDb) ;
		}
		
		
	}
	
	// On passe un tableau de question qui sont affiché
	function afficheQuestions($linkDb, $questions) {

		//print_r($questions); echo "<br />";
		// On parcourt chaque lignes
		
		// On prend le compteur à la question en cours
		if( isset($_SESSION["questionCourante"])) {
			$numQuestion = $_SESSION["questionCourante"];

		}
		
		// On remet à le compteur à zéro si on vien de commencer à répondre au QCM
		else {
			$_SESSION["questionCourante"] = 0;
			$numQuestion = $_SESSION["questionCourante"];
		}
		
		/*
		// Si fin du QCM
		if( isset($questions["$numQuestion"]) ) {
			
			
		}
		*/
		
		
		echo $numQuestion."<br />";
		
		echo "idQuestion = ".$questions["$numQuestion"]["idQuestion"]." ".$questions["$numQuestion"]["enonceQuestion"]."<br />";
		
			
			//echo "Question ".$numQuestion."<br />";
			//echo $question["enonceQuestion"]." "."<br />"
			
			//echo "id = ".$id."<br />";
			
		/*
			echo '<form method = "post" action ="repondreQCM.php?idQCM='.$_SESSION['idQCM']
				."&questionCourante=".$numQuestion++.'">'; */
		echo '<form method = "post" action ="'.enregistreRepBD().'">';
				afficheReponses(fetchReponses($linkDb, $questions["$numQuestion"]["idQuestion"]) );
				echo '<input type = "submit" name = "Question_suivante" value = "Question suivante" />';
			echo '</form>';
				
			echo "<br />";
			
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
	
	function enregistreRepBD() {
	
		$_SESSION['questionCourante']++;
		echo 'idQUestion : '.$_SESSION['questionCourante'].'<br />';
		
		/*
		$coordonnees = array (
				'Id' => '22',
				'R' => '0001');
		$Rep[] = $coordonnees; // append
		$coordonnees = array (
				'Id' => '22',
				'R' => '0010');
		$Rep[] =$coordonnees;
		print_r($Rep);
		
		$_SESSION["Rep"]=$Rep;
		*/
		
	}
	
