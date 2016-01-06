<?php
include_once 'Var.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$link = mysqli_connect($host,$user ,$password,$dbname);

	if (!$link) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
	}

	
	
	// on sélectionne la base
	mysqli_select_db($link,'Ulysse');
	
	
