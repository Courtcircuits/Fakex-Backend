<?php
namespace App\Fakex\controller;
use App\Fakex\model\Repository\ModeleRepository;
class ControllerModele {
    private static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }
    public static function readAll(){
        $modeles = (new ModeleRepository())->selectAll();
        self::afficheVue('view.php',['modeles'=>$modeles,"pagetitle"=>"Accueil"
        ,"cheminVueBody"=>"readAll.php"]);    }
    public static function create(){
        self::afficheVue('view.php',["pagetitle"=>"Ajoutez votre paire"
        ,"cheminVueBody"=>"create.php"]);
    }
}
?>