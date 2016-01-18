<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "Var.php";
include "connectDB.php";

//$_SESSION["idPersonne"] = "1000";
//temporaire en attendant les sessions et les users

if ($_POST["nom"] != "" && $_SESSION["idPersonne"] >=1000) {


    // on crée la requête SQL
    $sql = 'SELECT count(`idQCM`) as compte FROM `qcm` where `NomQCM` like \'' . $_POST["nom"] . '\'';

    // on envoie la requête
    $req = mysqli_query($link, $sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
    // on recupere la ligne 0 du resultat dans $data
    $data = mysqli_fetch_assoc($req);

    if ($data['compte'] != 0) {
        $_SESSION['msg'] = "Nom déja utilisée";
        header("Location:./CreaQCM.php");
    }

    $sql = "INSERT INTO qcm VALUES (NULL, \"" . $_SESSION["idPersonne"] . "\", \"" . $_POST["nom"] . "\");";
    //echo $sql;

    if (mysqli_query($link, $sql)) {
        // On redirige le visiteur vers la page création de question
        header("Location:./visuCreaQCM.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    $sql ="SELECT idQCM as id FROM `qcm` where idPersonne like \"" . $_SESSION["idPersonne"] . "\" ORDER BY `qcm`.`idQCM` DESC limit 1";
    //echo $sql;
    // on envoie la requête
    $req = mysqli_query($link, $sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
    // on recupere la ligne 0 du resultat dans $data
    $data2 = mysqli_fetch_assoc($req);
    //print_r($data2);
    $_SESSION["idQCM"]=$data2['id'];
    //echo $data2['id'];
    
} else {
    $_SESSION["msg"] = "Probleme: nom manquant";
    header("Location:./CreaQCM.php");
}