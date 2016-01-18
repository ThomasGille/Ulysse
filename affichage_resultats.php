<html>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css" /> 
</html>


<?php
include_once 'Var.php';
include_once 'connectDB.php';
include_once "Menu.php";

    $sql = "SELECT * FROM `qcm`";	
    if ( $result = mysqli_query( $link, $sql ) ) {
        $QCM = mysqli_fetch_all( $result, MYSQLI_ASSOC ) ;
        mysqli_free_result( $result ) ;
    }
    else {
        $_SESSION["msg"] = mysqli_error($linkDb);
    }
		
$sql = "SELECT * FROM resultat ORDER BY idQCM";
if ( $result = mysqli_query( $link, $sql ) ) {
    $RESULTATS = mysqli_fetch_all( $result, MYSQLI_ASSOC ) ;
    mysqli_free_result( $result ) ;
}
else {
    $_SESSION["msg"] = mysqli_error($link);
}

// Si Connexion
if (isset($_SESSION ["idPersonne"])){
    //Si Prof
    if ($_SESSION ["idPersonne"] >=1000){
        foreach( $QCM as $indexLigne => $qcm ) {   
            ?>
            <html>
            <table>
            <thead>
            <tr>
                
            <th>Id Elève</th>
            <th>Note</th>
            
            </tr>
            </thead>
            <tbody>
            </html>
            
            <?php
            echo "<h4>QCM ".$qcm['idQCM']." - ".$qcm['NomQCM']."</h4>";
            foreach ($RESULTATS as $indexRes => $res){
                
                 if ($res['idQCM'] == $qcm['idQCM']){
                     echo "<tr><td>".$res['idPersonne']."</td>";
                     echo "<td>".$res['note']."</td></tr>";
                     
                 }
            }
        }
    }
    ?>
    <html>
    </tbody>
    </table>
    </html>
    <?php
   
    if ($_SESSION ["idPersonne"] <1000){
        ?>
        <html>
        <table>
        <thead>
        <tr>
        <?php 
       
        foreach( $QCM as $indexLigne => $qcm ) {   
            
            ?>      
            </tr>
            </thead>
            <tbody>
            </html> 
            <?php
            echo "<th>QCM ".$qcm['NomQCM']."</th>";
            foreach ($RESULTATS as $indexRes => $res){

                if ($res['idQCM'] == $qcm['idQCM']&& $res['idPersonne']==$_SESSION ["idPersonne"]){
                    echo "<td>".$res['note']."</td>";  
                }
            }

    }
}
}
?>
<html>
</tbody>
</table>
</html>




<!--  $requete1="SELECT idQCM FROM qcm ";
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
    -->





