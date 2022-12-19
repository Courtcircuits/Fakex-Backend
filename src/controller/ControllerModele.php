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
class ControllerModele {
    private static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }
    public static function readAll(){
        $modeles = (new ModeleRepository())->selectAll();
        self::afficheVue('view.php',['modeles'=>$modeles,"pagetitle"=>"Accueil"
        ,"cheminVueBody"=>"Accueil/readAll.php"]);    }
    public static function readMen(){
        $modeles = (new ModeleRepository())->selectMen();
        self::afficheVue('view.php',['modeles'=>$modeles,"pagetitle"=>"Men Shoes"
        ,"cheminVueBody"=>"Accueil/readAll.php"]);
    }
    public static function readWomen(){
        $modeles = (new ModeleRepository())->selectWomen();
        self::afficheVue('view.php',['modeles'=>$modeles,"pagetitle"=>"Men Shoes"
        ,"cheminVueBody"=>"Accueil/readAll.php"]);
    }
    public static function created(){
        $modele = new Modele(null,$_GET['paire'],$_GET['prix'],$_GET['createur'],$_GET['image'],39,45,$_GET['genre']);
        (new ModeleRepository())->createShoe($modele);
        self::afficheVue('view.php',["pagetitle"=>"Connectez-vous"
        ,"cheminVueBody"=>"Produit/testAffichageImage.php",]);
    }
    public static function readSingleProduct(){
        $modele = (new ModeleRepository())->selectOne($_GET['id']);
        self::afficheVue('view.php',['modele' => $modele,
            "pageTitle" => "Affichage Produit Unique",
            "cheminVueBody" => "Accueil/read"]);
    }
    public static function addProduitPanier(){
        $idModele = $_GET['idmodele'];
        (new UtilisateurRepository())->ajoutProd($idModele);
        ControllerModele::readAll();
    }
}
?>


