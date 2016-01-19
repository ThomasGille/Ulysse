
<?php
		include_once 'Var.php';

function Session($idPers, $prenomPers, $mail){
    
    $_SESSION['idPersonne'] = $idPers;	
    $_SESSION['prenomPersonne'] = $prenomPers;
    $_SESSION['mailPersonne'] = $mail;

}