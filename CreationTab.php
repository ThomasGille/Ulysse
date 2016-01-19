<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "Var.php";
include_once "connectDB.php";
	
	
	echo 'Question courante avant ++ : ' . $_SESSION ['questionCourante'] . '<br />';
	$_SESSION ['questionCourante'] ++;
	if (isset ( $_POST ['cha'] ))	$cha = 1;
	else    $cha = 0;
	if (isset ( $_POST ['chb'] ))   $chb = 1;
	else    $chb = 0;
	if (isset ( $_POST ['chc'] ))   $chc = 1;
	else    $chc = 0;
	if (isset ( $_POST ['chd'] ))   $chd = 1;
	else    $chd = 0;
	
	$string = $cha . $chb . $chc . $chd;
	
	
	$coordonnees = array (
			'Id' => $_SESSION ['idQuestion'],
			'R' => $string 
	);
        if(isset($_SESSION ["Rep"])){
            $Rep=$_SESSION ["Rep"];
        }
        $Rep [] = $coordonnees;
        $_SESSION ["Rep"] = $Rep;
	 // append
	
	if($_SESSION ['questionCourante'] ==$_SESSION ["cpt"] ){
            
           // echo" patata, cpt atteint";
            header ( "Location:CalculNote.php" );
        }
        else {
            
           // echo" Another question";
            header ( "Location:repondreQCM.php?idQCM=".$_SESSION ["idQCM"] );
        }
	
