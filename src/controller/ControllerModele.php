<?php
namespace App\Fakex\controller;
use App\Fakex\model\Repository\ModeleRepository;
use App\Fakex\model\DataObject\Modele;
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
}
?>