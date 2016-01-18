<html>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="style2.css" /> 
</html>

<?php




include_once 'connectDB.php';
include_once 'menuProf.php';
include_once 'Var.php';

/*function fetchResultats($linkDb){
$sql = "SELECT * FROM resultat WHERE idQCM=  ";
$req = mysqli_query($linkDb,$sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$data = mysqli_fetch_array($req);
 mysqli_free_result ($req);
        
 echo '<a href="Consultation.php">    QCM' .$data['idQCM'];

}

fetchResultats($link);*/
var_dump($_POST['idQCM']);
