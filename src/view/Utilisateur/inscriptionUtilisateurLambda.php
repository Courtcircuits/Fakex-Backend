<div id="connection">
    <form method="GET" action="frontController.php">
        <fieldset>
            <legend>Inscription utilisateur</legend>
            <hr>

            <input type='hidden' name='action' value='createdUtilisateurLambda'>
            <input type='hidden' name='controller' value='utilisateur'>

            <input type="text" placeholder="Nom d'utilisateur" name="login" id="login_id" required/>
            <input type="password" name="password" id="password_id" placeholder="Mot de passe" required/>
            <input type="email" name="email" id="email" placeholder="email" required/>
            <input type="text" name="nom" id="nom" placeholder="Nom" required/>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required/>
            <input type="submit" value="Envoyer"/>

        </fieldset>
    </form>
</div>