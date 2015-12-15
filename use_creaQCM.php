<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start ();

if(     $_POST["nom"]!=""     ){
    echo $_POST["nom"];
    echo 'patate';
    
}
else {
    echo 'pims';
    $_SESSION["msg"]="Probleme nom manquant";
    header("Location:./CreaQCM.php");
}