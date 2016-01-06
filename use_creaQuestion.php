<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "connectDB.php";

///////////// insertion question
$sql = "INSERT INTO question VALUES (NULL, \"" . $_SESSION["idQCM"] . "\", \"" . $_POST["question"] . "\");";
//echo $sql;

if (mysqli_query($link, $sql)) {
    // On redirige le visiteur vers la page création de question
    echo 'question insérée <br />';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

////////////////recup id question
$sql = "SELECT idQuestion as id FROM `question` where idQCM like \"" . $_SESSION["idQCM"] . "\" ORDER BY `question`.`idQuestion` DESC limit 1";
//echo $sql;
// on envoie la requête
$req = mysqli_query($link, $sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
// on recupere la ligne 0 du resultat dans $data
$data = mysqli_fetch_assoc($req);
//print_r($data2);
$idQuestion = $data['id'];
echo "ID question = " . $idQuestion . "<br />";

/////////// insertion réponses

if (isset($_POST['cha']))
    $cha = 1;
else
    $cha = 0;
if (isset($_POST['chb']))
    $chb = 1;
else
    $chb = 0;
if (isset($_POST['chc']))
    $chc = 1;
else
    $chc = 0;
if (isset($_POST['chd']))
    $chd = 1;
else
    $chd = 0;

$sql = "INSERT INTO `ulysse`.`reponse` (`idReponse`, `idQuestion`, `enonceReponse`, `juste`) VALUES 
        (NULL, " . $idQuestion . ", \"" . $_POST['rep1'] . "\"," . $cha . "), 
        (NULL, " . $idQuestion . ", \"" . $_POST['rep2'] . "\"," . $chb . "),
        (NULL, " . $idQuestion . ", \"" . $_POST['rep3'] . "\"," . $chc . "),
        (NULL, " . $idQuestion . ", \"" . $_POST['rep4'] . "\"," . $chd . ");";
//echo $sql;


if (mysqli_query($link, $sql)) {
    // On redirige le visiteur vers la page création de question
    echo 'réponse insérée';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

// On redirige le visiteur vers la page création de question
header("Location:./visuCreaQCM.php");
$_SESSION["msg"]="Question ajoutée!";