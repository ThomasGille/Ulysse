<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function select($sql)
{
        // on envoie la requête
    $req = mysqli_query($link, $sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());

    // on recupere la ligne 0 du resultat dans $data
    $data = mysqli_fetch_assoc($req);
    
    return $data;
}

