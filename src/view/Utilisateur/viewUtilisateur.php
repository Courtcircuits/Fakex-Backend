<?php
use App\Fakex\model\Repository\UtilisateurRepository;
        if (!isset($_SESSION['login'])) {
            header("Location: frontController.php?action=connexionUtilisateurLambda&controller=utilisateur");
        }
        $utilisateur = (new UtilisateurRepository())->getUser($_SESSION['login']);
        $products = (new UtilisateurRepository())->getProductCreated($utilisateur->getLogin());
        ?>
<div id="pay">
    <h2>
        Profil de <?php echo $utilisateur->getPrenom() . " " . $utilisateur->getNom(); ?>
    </h2>
    <!-- create a table to display the products (nom, taille max, taille min, prix, quantités, genre) -->
    <table>
        <tr>
            <th>Nom</th>
            <th>Taille max</th>
            <th>Taille min</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Genre</th>
        </tr>
        <?php
        foreach ($products as $product) {
            echo '<tr>
            <td>' . $product->getNom() . '</td>
            <td>' . $product->getMaxSize() . '</td>
            <td>' . $product->getMinSize() . '</td>
            <td>' . $product->getPrix() . '</td>
            <td>' . $product->getQuantity() . '</td>
            <td>' . $product->getGenre() . '</td>
        </tr>';
        }
        ?>
    </table>

</div>
