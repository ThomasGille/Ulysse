


<html>
    <meta charset="UTF-8">
</html>

<?php
include_once 'CryptageMdp.php';
include_once 'connectDB.php';



$idPers= $_POST['id'];
$pswd = $_POST['mdp'];


$Crypt = Cryptage($pswd);

if ($Crypt!= null){
    
    // 1. Personne dans BD ?? 
    $requete="SELECT idPersonne FROM personne WHERE idPersonne = $idPers";
    $reqID = mysqli_query($link, $requete) or die('Erreur SQL !<br>'.$requete.'<br>'.mysql_error());
    $idPers = mysqli_fetch_array($reqID);

    if ($idPers[0] == null){
        echo "Erreur : personne inexistante / ID erroné";
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
            $admin = $pswd = mysqli_fetch_array($req);
            
            if ($admin[0] == '1'){
                 header('Location: menuProf.php');      

            }
            else{
             header('Location: menuEleve.php');      
            }
          
        }else{
            echo "Erreur : MDP incorrect";
        }
    }
  }

