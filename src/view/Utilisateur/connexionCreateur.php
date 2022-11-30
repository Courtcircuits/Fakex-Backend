
        <form method="get" action="frontController.php">
            <fieldset>
              <legend>Connexion créateur </legend>
              <p>
                <input type='hidden' name='action' value='connectedUtilisateur'>
                <input type='hidden' name='controller' value='utilisateur'>


                <label for="login_id">Login</label> :
                <input type="text" placeholder="nike" name="login" id="login_id" required/>
              </p>
              <p>
                <label for="password_id">Mot de passe</label> :
                <input type="password" name="password" id="password_id" required/>
              </p>
              <p>Vous n'avez pas de compte ? <a href="frontController.php?action=inscriptionCreateur&controller=utilisateur">Inscrivez vous</a></p>
              <p>
                <input type="submit" value="Envoyer" />
              </p>
              

            </fieldset> 
          </form>
        <?php
            if(!empty($message)){
                echo "<p>$message</p>";
            }
        ?>