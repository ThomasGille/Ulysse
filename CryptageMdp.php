<?php


//$pswrd = $POST["mdp"];

$pswrd = "azerty";

 echo crypt($pswrd, password_hash($pswrd, PASSWORD_BCRYPT));


