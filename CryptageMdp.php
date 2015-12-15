<?php


$pswrd = "azerty";

//function Cryptage($pswrd){
    
    $pswrdHashed = password_hash($pswrd, PASSWORD_BCRYPT);
    
    echo crypt($pswrd, $pswrdHashed );
    echo "<br/>";
    
    echo $pswrdHashed;

    if (crypt($pswrd, $pswrdHashed) == $pswrdHashed){
        return $pswrdHashed;
    }else{
       return null; 
    }
//}               