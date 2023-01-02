<div id="pay">
    <h2>
        Recapitulatif de votre commande
    </h2>
    <!--table containing as colums : name, price, size, quantity, total price-->
    <table>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Taille</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>
        <?php
        use App\Fakex\model\Repository\ModeleRepository;
        use App\Fakex\model\Repository\UtilisateurRepository;
        
        if(isset($_SESSION['login'])){
            $panier = UtilisateurRepository::getProdPanier();
        }else{
            $modeles = unserialize($_COOKIE['panier']);
            foreach($modeles as $elt){
                $panier[] = (new ModeleRepository())->selectOne(intval($elt));
            }
        }
        $total = 0;
        foreach ($panier as $produit) {
            $total += $produit->getPrix() * $produit->getQuantity();
            echo '<tr>
            <td>' . $produit->getNom() . '</td>
            <td>' . $produit->getPrix() . '</td>
            <td>' . $produit->getMinSize() . '</td>
            <td>' . $produit->getQuantity() . '</td>
            <td>' . $produit->getPrix() * $produit->getQuantity() . '</td>
        </tr>';
        }
        ?>
    </table>

    <div class="btnpages">
        <a href="frontController.php?action=pay&controller=utilisateur">Payer</a>
    </div>
</div>
