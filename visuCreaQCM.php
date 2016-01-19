<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style2.css" />
        <title>Création QCM</title>
    </head>
    <body>

        <h1> QCM n°
            <?php
            include "connectDB.php";
           
            if (isset($_GET["idQCM"])){
                $IdQCM = $_GET["idQCM"];
                echo $IdQCM;
                $_SESSION["idQCM"] = $IdQCM;
            }else{
                if(isset($_SESSION["idQCM"])){
                     $IdQCM = $_SESSION["idQCM"];
                     echo $IdQCM;
                }else{
                    echo "erreur ! ";
                }
            }
            ?></h1>
        <p><div id="texte">
        <?php
        
            $qcms = fetchQuestion($link,$IdQCM);
            //var_dump($qcms);
            //afficheQcm($qcms);  
            afficheQuestion($qcms,$link);
        ?>
        <br />
        <form method="link" action="CreaQuestion.php"> <input type="submit" value="Ajouter une question"></form>
        <form method="link" action="AnnulQCM.php"> <input type="submit" value="Annuler / Tout supprimer"></form>
        <form method="link" action="index.php"> <input type="submit" value="Sauvegarder et partir"></form>
        </div></p>
        </body>
    
</html>

<?php 

	function fetchQuestion($link,$IdQCM) {

		//print_r($reponses) ; echo '<br />';
		
		$sql = "SELECT * FROM `question` where idQCM =" .$IdQCM;
		
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
		//On affiche tous les QCM
		foreach( $qcms as $indexLigne => $question ) {
			
			// On passe l'id du QCM dans $_GET pour repondre au QCM
                    ?>
		<div class="question">	
                    <?php 
                    echo $question["enonceQuestion"].'<br />';
                    ?>
                </div>
                <?php
                        $_SESSION["idQuestion"]=$question["idQuestion"];
                        
                        $rep = fetchReponses($link);
                        foreach( $rep as $indexLigne => $reponses ) {
                ?>
			
                    <?php 
                    if($reponses["juste"]==1){
                        echo '<div class="True">';
                        echo $reponses["enonceReponse"].'<br />';
                        echo '</div>';
                    }
                    else {
                        echo '<div class="False">';
                        echo $reponses["enonceReponse"].'<br />';
                        echo '</div>';
                    }
                    ?>
                </div>
                <?php
                        }
		}
	}
?>
