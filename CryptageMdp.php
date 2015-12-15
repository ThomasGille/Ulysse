<?php




function Cryptage($pswrd){
    
    $pswrdHashed = password_hash($pswrd, PASSWORD_BCRYPT);
    echo crypt($pswrd, $pswrdHashed )+"<br>";
    echo $pswrdHashed+"<br>";

    if (crypt($pswrd, $pswrdHashed) == $pswrdHashed){
        return $pswrdHashed;
    }else{
       return null; 
    }
}               