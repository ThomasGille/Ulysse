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
            <tr>
                
            <th>Id Elève</th>
            <th>Note</th>
            
            </tr>
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
        echo"</table>";
    }

   else{
        echo"<table><tr>";
        foreach( $QCM as $indexLigne => $qcm ) {   
            echo"</tr>";
            echo "<th>QCM ".$qcm['NomQCM']."</th>";
            foreach ($RESULTATS as $indexRes => $res){

                if ($res['idQCM'] == $qcm['idQCM']&& $res['idPersonne']==$_SESSION ["idPersonne"]){
                    echo "<td>".$res['note']."</td>";  
                }
            }
          echo" </table>";
        }
    }
}
