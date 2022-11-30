
        <form method="get" action="frontController.php">
            <fieldset>
              <legend>Inscription créateur </legend>
              <p>
                <input type='hidden' name='action' value='created'>
                <input type='hidden' name='controller' value='modele'>


                <label for="login_id">Login</label> :
                <input type="text" placeholder="nike" name="login" id="login_id" required/>
              </p>
              <p>
                <label for="password_id">Mot de passe</label> :
                <input type="password" name="password" id="password_id" required/>
              </p>
              <p>
                <label for="email">Email</label> :
                <input type="email" name="email" id="email" required/>
              </p>
                <p>
                    <label for="nom">Nom</label> :
                    <input type="text" name="nom" id="nom" required/>
                </p>
                <p>
                    <label for="prenom">Prénom</label> :
                    <input type="text" name="prenom" id="prenom" required/>
                </p>
              <p>
                <input type="submit" value="Envoyer" />
              </p>
              

            </fieldset> 
          </form>