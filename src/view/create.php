
        <form method="get" action="frontController.php">
            <fieldset>
              <legend>Ajoutez votre paire :</legend>
              <p>
                <input type='hidden' name='action' value='created'>
                <input type='hidden' name='controller' value='modele'>


                <label for="paire_id">Nom de votre paire</label> :
                <input type="text" placeholder="nike" name="paire" id="paire_id" required/>
              </p>
              <p>
                <label for="prix_id">Prix</label> :
                <input type="number" placeholder="100" name="prix" id="prix_id" required/>
              </p>
              <p>
                <label for="creator_id">Couleur</label> :
                <input type="text" placeholder="sean wotherspoon" name="creator" id="creator_id" required/>
              </p>
              <p>
                <label for="image_id">L'image de votre paire</label> :
                <input type="file" name="image" id="image_id" required/>
              </p>
              <p>
                <input type="submit" value="Envoyer" />
              </p>
              

            </fieldset> 
          </form>