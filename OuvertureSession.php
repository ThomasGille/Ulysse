
<?php
		include_once 'Var.php';

function Session($idPers, $prenomPers){
    
    $_SESSION['idPersonne'] = $idPers;	
	$_SESSION['prenomPersonne'] = $prenomPers;

}