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
            include_once "Menu.php";
            include_once "connectDB.php";

            // Prise en charge des erreurs
            verifQcm ( $link );
            var_dump($_SESSION ["Rep"]);
            
            $_SESSION ["cpt"]=Compte_question($link,$_GET ["idQCM"]);
            echo "Nombre de quesion du QCM : ".$_SESSION ["cpt"];
            $idQCM = $_GET ["idQCM"];
            $_SESSION ["idQCM"] = $_GET ["idQCM"];
            
            // $_SESSION["questionCourante"] = 1 ;
            ?>
                
        <h1>QCM <?php echo $idQCM ;?></h1>
                
       <?php
            // On récupère toutes les questions
            $question = fetchQuestions ( $link, $idQCM );
            afficheQuestions ( $link, fetchQuestions ( $link, $idQCM ) );

            print_r ( fetchQuestions ( $link, $_SESSION ["idQCM"] ) );

            if (isset ( $_SESSION ["msg"] )) {
                    echo $_SESSION ["msg"];
                    $_SESSION ["msg"] = NULL;
            }
            ?>
    </body>
</html>

<?php
function verifQcm($linkDb) {
	
	// Si on accède à la page sans passer par la liste des QCM, rediriger vers celle-ci.
	if (! isset ( $_GET ["idQCM"] )) {
		header ( "Location:listeQCM.php" );
	}
	
	// Erreur et redirection vers la liste si le QCM n'existe pas
	$sql = "SELECT `idQcm` FROM `question` WHERE `idQCM` LIKE " . $_GET ["idQCM"];
	
	// Si la requête a réussi on récupère toutes les questions de la table
	if ($result = mysqli_query ( $linkDb, $sql )) {
		
		// Compte le nombre de réponses
		if (mysqli_num_rows ( $result ) < 1) {
			
			$_SESSION ["msg"] = "Erreur, le QCM demandé n'existe pas <br />";
			header ( "Location:listeQCM.php" );
		}
		mysqli_free_result ( $result );
		
		// return $rows;
	} 	

	// Sinon affiche l'erreur
	else {
		
		$_SESSION ["msg"] = mysqli_error ( $linkDb );
	}
}

function fetchQuestions($linkDb, $idQCM) {
	
	// print_r($reponses) ; echo '<br />';
	$sql = "SELECT * FROM `question` WHERE `idQCM` LIKE " . $idQCM;
	
	// Si la requête a réussi on récupère toutes les questions de la table
	if ($result = mysqli_query ( $linkDb, $sql )) {
		
		$rows = mysqli_fetch_all ( $result, MYSQLI_ASSOC );
		mysqli_free_result ( $result );
	} 	

	// Sinon affiche l'erreur
	else {
		
		$_SESSION ["msg"] = mysqli_error ( $linkDb );
	}
	
	return $rows;
}

// Récupère les réponses d'une question
function fetchReponses($linkDb, $idQuestion) {
	$sql = "SELECT `enonceReponse` FROM `reponse` WHERE `idQuestion` LIKE " . $idQuestion;
	
	// Si la requête a réussi on récupère toutes les questions de la table
	if ($result = mysqli_query ( $linkDb, $sql )) {
		
		// Compte le nombre de réponses
		// echo mysqli_num_rows($result)."<br />";
		$rows = mysqli_fetch_all ( $result, MYSQLI_ASSOC );
		mysqli_free_result ( $result );
		
		return $rows;
	} 	

	// Sinon affiche l'erreur
	else {
		
		$_SESSION ["msg"] = mysqli_error ( $linkDb );
	}
}

// On passe un tableau de question qui sont affiché
function afficheQuestions($linkDb, $questions) {
	
	// print_r($questions); echo "<br />";
	// On parcourt chaque lignes
	
	// On prend le compteur à la question en cours
	if (isset ( $_SESSION ["questionCourante"] )) {
		$numQuestion = $_SESSION ["questionCourante"];
	} 	

	// On remet à le compteur à zéro si on vien de commencer à répondre au QCM
	else {
		$_SESSION ["questionCourante"] = 0;
		$_SESSION["Rep"] = NULL;
		$numQuestion = $_SESSION ["questionCourante"];
	}
	
	/*
	 * // Si fin du QCM
	 * if( isset($questions["$numQuestion"]) ) {
	 *
	 *
	 * }
	 */
	$_SESSION["idQuestion"]=$questions ["$numQuestion"] ["idQuestion"];
	echo 'Question courante ='.$numQuestion . "<br />";
	echo "Question = " . $questions ["$numQuestion"] ["enonceQuestion"] . "<br />";
	$_SESSION ['idQuestion']=$questions ["$numQuestion"] ["idQuestion"];
	
        echo '<form method = "post" action ="CreationTab.php">';
       
	afficheReponses ( fetchReponses ( $linkDb, $questions ["$numQuestion"] ["idQuestion"] ) );
	echo '<input type = "submit" name = "Question_suivante" value = "Question suivante" />';
	echo '</form>';
	
	echo "<br />";
}

function afficheReponses($reponses) {
	//print_r ( $reponses );
	echo '<br />';
	
	echo $reponses ["0"] ["enonceReponse"] . ' : <input type="checkbox" name="cha"  /><br/>';
	echo $reponses ["1"] ["enonceReponse"] . ' : <input type="checkbox" name="chb"  /><br/>';
	echo $reponses ["2"] ["enonceReponse"] . ' : <input type="checkbox" name="chc"  /><br/>';
	echo $reponses ["3"] ["enonceReponse"] . ' : <input type="checkbox" name="chd"  /><br/>';
	/*
	 * // On parcourt chaque lignes
	 * foreach( $reponses as $id => $reponse ) {
	 *
	 * // On parcourt chaque colonnes
	 * foreach( $reponse as $cle => $champ ) {
	 * //echo '<input type="checkbox" name = '.$id.'" value="" />'.$champ.'<br />';
	 * }
	 *
	 * echo "<br />";
	 * }
	 */
}

function Compte_question($linkDb, $idQCM) {
	
	// print_r($reponses) ; echo '<br />';
	$sql = "SELECT count(*) as cpt FROM `question` WHERE `idQCM` LIKE  " . $idQCM;
	
	// Si la requête a réussi on récupère toutes les questions de la table
	if ($result = mysqli_query ( $linkDb, $sql )) {
		
		$rows = mysqli_fetch_all ( $result, MYSQLI_ASSOC );
		mysqli_free_result ( $result );
	} 	

	// Sinon affiche l'erreur
	else {
		
		$_SESSION ["msg"] = mysqli_error ( $linkDb );
	}
	
       
	return $rows[0]["cpt"];
}