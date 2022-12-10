<div id="connection">
    <form method="get" action="frontController.php">
        <fieldset>
            <legend>Ajouter un produit</legend>
            <hr>
                <input type='hidden' name='action' value='created'>
                <input type='hidden' name='controller' value='modele'>


                <input type="text" placeholder="Nom de votre paire" name="paire" id="paire_id" required/>
                <input type="number" name="prix" id="prix_id"  placeholder="Prix de votre paire" required/>
            <?php
            echo "
                            <label for=\"createur_id\">Votre nom de createur :</label> 
                            <input type=\"text\" name=\"createur\" id=\"createur_id\" value=\"{$nomCreateur}\" readonly/>
                          ";
            ?>
                <label for="image_id">Image de votre paire</label>
                <input type="file" name="image" id="image_id" accept="image/*" required/>

                <input type="submit" value="Envoyer"/>
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
</div>
