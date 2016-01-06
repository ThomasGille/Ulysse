<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include "Var.php";
include "connectDB.php";
include fonction.php;

$_SESSION["idPersonne"] = "1000";
//temporaire en attendant les sessions et les users

if ($_POST["nom"] != "" && isset($_SESSION["idPersonne"])) {



    // on crée la requête SQL
    $sql = 'SELECT count(`idQCM`) as compte FROM `qcm` where `NomQCM` like \'' . $_POST["nom"] . '\'';

    $data=select();

    if ($data['compte'] != 0) {
        $_SESSION['msg'] = "Nom déja utilisée";
        header("Location:./CreaQCM.php");
    }

    $sql = "INSERT INTO qcm VALUES (NULL, \"" . $_SESSION["idPersonne"] . "\", \"" . $_POST["nom"] . "\");";
    //echo $sql;

    if (mysqli_query($link, $sql)) {
        // On redirige le visiteur vers la page création de question
        header("Location:./CreaQuestion.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    $sql ="SELECT idQCM as id FROM `qcm` where idPersonne like 1000 ORDER BY `qcm`.`idQCM` DESC limit 1";
    $data2=select($sql);
    
    
} else {
    $_SESSION["msg"] = "Probleme nom manquant";
    header("Location:./CreaQCM.php");
}