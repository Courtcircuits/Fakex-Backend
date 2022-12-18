<?php
namespace App\Fakex\controller;
use App\Fakex\model\Repository\ModeleRepository;
use App\Fakex\model\DataObject\Modele;
use App\Fakex\model\DataObject\Utilisateur;
use App\Fakex\model\Repository\UtilisateurRepository;

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
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $modele = new Modele(null,$_POST['paire'],$_POST['prix'],$_POST['createur'],$image,39,45,$_POST['genre']);
        (new ModeleRepository())->createShoe($modele);
        self::afficheVue('view.php',["pagetitle"=>"Connectez-vous","cheminVueBody"=>"Produit/testAffichageImage.php",]);
    }    

    public static function readProduct(){
        $id = $_GET['id'];
        $modele = (new ModeleRepository())->selectOne($id);
        self::afficheVue('view.php',['modele'=>$modele,"pagetitle"=>$id
        ,"cheminVueBody"=>"Accueil/readSingleProduct.php"]);
    }

    public static function addProduitPanier(){
        $idModele = $_GET['idmodele'];
        (new UtilisateurRepository())->ajoutProd($idModele);
        ControllerModele::readAll();
    }
}
?>