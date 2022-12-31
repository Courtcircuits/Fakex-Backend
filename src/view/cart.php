<div id="cart">
    <div id="cart-container">
        <div id="header-cart" >
            <div>
                <?php
                require __DIR__."/../../web/img/cart.svg";
                ?>
                <h2>PANIER</h2>

            </div>
            <?php
            require __DIR__."/../../web/img/cross.svg"
            ?>
        </div>
        <?php
        use App\Fakex\model\Repository\UtilisateurRepository;
        $modeles = UtilisateurRepository::getProdPanier();
        if (empty($modeles)){
            echo '<div id="empty-cart" class="contain">
                <h3>Votre panier est vide</h3>
                <p>Vous n\'avez pas encore ajouté d\'article à votre panier.</p>
                <a href="frontController.php?action=readAll&controller=modele">Découvrez nos produits</a>
            </div>';
        }
        else{
            foreach ($modeles as $modele){
                echo '
                <div id="content-cart">
                <img src="' . $modele->getImageUrl() . '"/>
            <div id="legend" class="contain">
                <h3>' . $modele->getNom() . '</h3>
                <div>
                    <div>
                        <p>' . $modele->getMaxSize() . ' EU - 9 US - ' . $modele->getPrix() . '€</p>
                    </div>
                    <div>
                        <p>' . $modele->getPrix() . '€</p>
                        <span>
                            <a href ="frontController.php?action=suprProduitPanier&controller=modele&idmodele='. $modele->getIdModele() .'" ><p>Supprimer</p></a>
                            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.7754 9.78428L23.3754 8.38428L16.7754 14.9843L10.1754 8.38428L8.77539 9.78428L15.3754 16.3843L8.77539 22.9843L10.1754 24.3843L16.7754 17.7843L23.3754 24.3843L24.7754 22.9843L18.1754 16.3843L24.7754 9.78428Z" fill="black"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
                </div>
            ';
            }
        }
        
        ?>
        <hr>
        <?php
        if(!isset($_SESSION['login'])){
            echo '<div id="summary" class="contain">
<a href="frontController.php?action=inscriptionCreateur&controller=utilisateur">S\'INSCRIRE</a>
<a href="frontController.php?action=connexionCreateur&controller=utilisateur">SE CONNECTER</a>
</div>
';
        }else if(empty($modeles)){

        }else{
            echo '<div id="summary" class="contain">
            <div>
                <p>€'. UtilisateurRepository::getSumPanier() .'</p>
                <p>SOUS-TOTAL</p>
            </div>
            <a href="frontController.php?action=paiement&controller=utilisateur">PAIEMENT</a>
            <a href="frontController.php?action=affichagePanier&controller=utilisateur">ALLER AU PANIER</a>
        </div>';
        }
        ?>

    </div>
</div>
