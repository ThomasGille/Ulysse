

<?php
include_once 'Var.php';
include_once 'CryptageMdp.php';
include_once 'connectDB.php';
include_once 'OuvertureSession.php';
?>

<html>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="style2.css" /> 
</html>

<?php


$idPers= $_POST['id'];
$pswd = $_POST['mdp'];


$Crypt = Cryptage($pswd);



    if ($Crypt!= null){

        // 1. Personne dans BD ?? 
        $requete="SELECT idPersonne FROM personne WHERE idPersonne = $idPers";
        $reqID = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
        $idPers = mysqli_fetch_array($reqID);

        if ($idPers[0] == null){
            include "Login.php";
            echo "<h5>";
            echo "Erreur : personne inexistante / ID erroné";
            echo "</h5>";
            

        }else{
            // si etape 1. vrai : 
            // 
            // 2. Récupération Mdp de la personne
            $requete="SELECT Mdp FROM ulysse.mdp WHERE idPersonne = $idPers[0] ";
            $MDPHash = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
            $pswd = mysqli_fetch_array($MDPHash);



            // 4. Verification Password
            if ($pswd[0]== $Crypt){
                //5. Verification si Personne est prof ou élève
                $requete="SELECT admin FROM personne WHERE idPersonne = $idPers[0] ";
                $req = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
                $admin = mysqli_fetch_array($req);

               // 6. Recuperation de son nom
                            $requete="SELECT prenom FROM $dbname.personne WHERE idPersonne = $idPers[0]";
                            $reqID = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
                            $nomPers = mysqli_fetch_array($reqID);
               // Recupération de son mail
                            $requete="SELECT mail FROM personne WHERE idPersonne = $idPers[0] ";
                $req = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
                $mail = mysqli_fetch_array($req);

                if ($admin[0] == '1'){
                    Session($idPers[0], $nomPers[0], $mail[0]);

                    header('Location: index.php');      

                }
                else{
                    Session($idPers[0],$nomPers[0]);

                    header('Location: index.php');      
                }

            }else{
                
                include "Login.php";
                echo "<h5>";
                echo "Erreur : MDP incorrect";
                echo "</h5>";
                
                
                
            }
        }
      }
 


