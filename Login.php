
<!DOCTYPE HTML>

<html>
    <meta charset="utf-8">
     <link rel="stylesheet" href="style2.css" /> 

    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
    </head>


    <body>

        <h1>Connexion</h1> 
        <form id="form" method="post" action="GestionDroit.php">
            <fieldset>
			<h4>Login</h4>
                <label><input type="number" name="id" value="" required /></label>
                <br>
                <h4>Mot de Passe</h4>
                <label><input type="password" name="mdp" value="password" required /></label>
               
				<br><br>
                <input type="submit">	
            </fieldset> 
        </form>
    </article>

</body>
<?php include "footer.php"; 
