<?php
namespace App\Fakex\controller;

use App\Fakex\model\Repository\ModeleRepository;
use App\Fakex\model\DataObject\Modele;
use App\Fakex\model\DataObject\Utilisateur;
use App\Fakex\model\Repository\UtilisateurRepository;

/**
 * Cette méthode est la classe intermédiaire entre les repository's et les vues
 *
 * <p>
 *  Elle connecte la classe {@link ModeleRepository} avec les vues qui affichent toute l'information récolté
 *
 * </p>
 */
class ControllerModele
{
    private static function afficheVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }

    public static function readAll()
    {
        $modeles = (new ModeleRepository())->selectAll();
        self::afficheVue('view.php', ['modeles' => $modeles, "pagetitle" => "Accueil"
            , "cheminVueBody" => "Accueil/readAll.php"]);
    }

    public static function readMen()
    {
        $modeles = (new ModeleRepository())->selectMen();
        self::afficheVue('view.php', ['modeles' => $modeles, "pagetitle" => "Men Shoes"
            , "cheminVueBody" => "Accueil/readAll.php"]);
    }

    public static function readWomen()
    {
        $modeles = (new ModeleRepository())->selectWomen();
        self::afficheVue('view.php', ['modeles' => $modeles, "pagetitle" => "Men Shoes"
            , "cheminVueBody" => "Accueil/readAll.php"]);
    }

    public static function created()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        if (isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if ($error === 0) {
                if ($img_size > 12500000) {
                    self::readAll();
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                        $img_path = __DIR__ . '/../../web/img/uploads/' . $new_img_name;
                        move_uploaded_file($tmp_name, $img_path);
                        $modele = new Modele(0, $_POST['paire'], $_POST['prix'], $_POST['createur'], 'frontController.php?action=afficheImage&controller=image&idImage=' . $new_img_name, 39, 45, $_POST['genre']);
                        (new ModeleRepository())->createShoe($modele);
                        self::afficheVue('view.php', ["pagetitle" => "Connectez-vous"
                            , "cheminVueBody" => "Produit/testAffichageImage.php"]);
                    } else {
                        self::readAll();
                    }
                }
            } else {
                self::readAll();
            }
        } else {
            self::readAll();
        }


    }

    public static function readSingleProduct()
    {
        $modele = (new ModeleRepository())->selectOne($_GET['id']);
        self::afficheVue('view.php', ['modele' => $modele,
            "pageTitle" => "Affichage Produit Unique",
            "cheminVueBody" => "Accueil/readSingleProduct.php"]);
    }

    public static function addProduitPanier()
    {
        $idModele = $_GET['idmodele'];
        (new UtilisateurRepository())->ajoutProd($idModele);
        ControllerModele::readAll();
    }

    public static function recommand()
    {
        $recommandations = (new ModeleRepository())->recommandShoe($_GET['search']);
        //print as a json array content of $recommandations
        echo json_encode($recommandations);
        header("Content-Type: application/json");
    }

    public static function bestSeller()
    {

        $bestSeller = (new ModeleRepository())->getBestSeller($_GET['rank']);
        //print as a json array content of $recommandations
        echo json_encode($bestSeller);
        header("Content-Type: application/json");
    }

}

?>


