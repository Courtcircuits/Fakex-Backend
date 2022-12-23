<div>
    <H1>Votre Panier</H1>
</div>
<div>
    <h2>

    </h2>
</div>
<div>
<?php
use App\Fakex\model\Repository\UtilisateurRepository;
$modeles = UtilisateurRepository::getProdPanier();

foreach ($modeles as $modele){
    echo '
                <div id="content-cart">
                <img style="height:500px;width:400px;" src="' . $modele->getImageUrl() . '"/>
            <div id="legend" class="contain">
                <h3>' . $modele->getNom() . '</h3>
                <div>
                    <div>
                        <p>' . $modele->getMaxSize() . ' EU - 9 US - ' . $modele->getPrix() . '€</p>
                    </div>
                    <div>
                        <p>' . $modele->getPrix() . '€</p>
                        <span>
                            <p>Supprimer</p>
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


?>
</div>
<div id="summary" class="contain">
    <a href="frontController.php?action=paiement&controller=utilisateur">PAIEMENT</a>
    <a>Test</a>
    <a>Second Test</a>
</div>