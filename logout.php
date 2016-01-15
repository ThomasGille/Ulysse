<?php
include_once 'Var.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    

    // On détruit les variables de notre session
    session_unset ();

    // On détruit notre session
    session_destroy ();

    // On redirige le visiteur vers la page d'accueil
    header("Location:index.php");

