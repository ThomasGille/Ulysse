<html>
    <meta charset="UTF-8">
</html>


<?php
include_once 'Var.php';
include_once 'connectDB.php';
include_once 'menuProf.php';



  $requete1="SELECT idQCM FROM qcm ";
            $req1 = mysqli_query($link, $requete1) or die('Erreur SQL !<br>'.$requete1.'<br>'.mysql_error());
            
           $requete2="SELECT count(idQCM) FROM qcm ";
            $req2 = mysqli_query($link, $requete2) or die('Erreur SQL !<br>'.$requete2.'<br>'.mysql_error());
             $count = mysqli_fetch_array($req2);
              //$data = mysqli_fetch_array($req);
  
            
            
  
 
    echo "<form id=\"idqcm\" action=\"Consultation.php\" method=\"post\">";
   for ($i=0 ; $i<$count[0] ; $i++){
        $data = mysqli_fetch_array($req1);
        var_dump($data);
        echo "<input type=\"hidden\" name=idQCM value=$data[0] />";
        echo "</form>";
        echo "<br/>";
        echo "<a href='#' onclick='document.getElementById(\"idqcm\").submit()'>QCM $data[0]</a> ";
    
    }
    






