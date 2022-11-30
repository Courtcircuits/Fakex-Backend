
        <form method="get" action="frontController.php">
            <fieldset>
              <legend>Ajouter un produit</legend>
              <p>
                  <input type='hidden' name='action' value='created'>
                  <input type='hidden' name='controller' value='modele'>


                <label for="paire_id">Nom de votre paire</label> :
                <input type="text" placeholder="nike" name="paire" id="paire_id" required/>
              </p>
              <p>
                <label for="prix_id">Prix de la paire</label> :
                <input type="number" name="prix" id="prix_id" required/>
              </p>
                <?php
                    echo "<p>
                            <label for=\"createur_id\">Votre nom de createur</label> :
                            <input type=\"text\" name=\"createur\" id=\"createur_id\" value=\"{$nomCreateur}\" readonly/>
                          </p>" ;
                ?>
                <p>
                    <label for="image_id">Image de votre paire</label> :
                    <input type="file" name="image" id="image_id" accept="image/*" required/>
                </p>
              <p>
                <input type="submit" value="Envoyer" />
              </p>
            </fieldset> 
          </form>
        <?php
            if (isset($_POST['submit'])) {
                $imageName = $_FILES['image']['name'];
                $imageData = file_get_contents($_FILES['image']['tmp_name']);
                echo $imageName;
                echo $imageData;
            }
            ?>