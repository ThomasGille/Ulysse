
<!DOCTYPE HTML>

<html>
    <meta charset="utf-8">
    <link rel="stylesheet" href="" /> 

    <head>
        <title>UlysseQCM IUT_Lyon1</title>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
    </head>


    <body>

        <h4>Connexion</h4>
        <form id="form" method="post" action="GestionDroit.php">
            <fieldset>
                <label><input name="id" value="Login" onBlur="if (this.value == '')
                            this.value = 'Login'" onFocus="if (this.value == 'Login')
                                        this.value = ''" required /></label>
                <br>
                <p>Mot de Passe</p>
                <label><input type="password" name="mdp" value="password" onBlur="if (this.value == '')
                            this.value = 'password'" onFocus="if (this.value == 'password')
                                        this.value = ''" required /></label>
                <br><br>
                <input type="submit">	
            </fieldset> 
        </form>
    </article>

</body>
