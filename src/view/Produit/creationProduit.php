
        <form method="get" action="frontController.php">
            <fieldset>
              <legend>Ajouter un produit</legend>
              <p>
                <input type='hidden' name='action' value='create'>
                <input type='hidden' name='controller' value='utilisateur'>


                <label for="paire_id">Login</label> :
                <input type="text" placeholder="nike" name="paire" id="paire_id" required/>
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