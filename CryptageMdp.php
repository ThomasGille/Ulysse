<?php


//$pswrd = $POST["mdp"];

 $pswrd = "azerty";
 $pswrdHashed = password_hash($pswrd, PASSWORD_BCRYPT);

echo crypt($pswrd, $pswrdHashed );
 
if (crypt($pswrd, $pswrdHashed ) == $pswrdHashed){
    echo "mdp correct"; 
}else{
    echo "mdp incorrect";
}
 
                