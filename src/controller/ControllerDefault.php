<?php
namespace App\Fakex\controller;
use App\Fakex\model\Repository\ModeleRepository;
class ControllerDefault {

    private static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }
    public static function accueil(){
        $modeles = (new ModeleRepository())->selectAll();
        self::afficheVue('view.php',['modeles'=>$modeles,"pagetitle"=>"Accueil"
        ,"cheminVueBody"=>"Accueil/readAll.php"]);
    }
    public static function error() : void {
        self::afficheVue('Error/generalError.php');
    }
}
?>
