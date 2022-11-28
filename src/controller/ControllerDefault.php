<?php
namespace App\Fakex\controller;
use App\Fakex\model\Repository\ModeleRepository;
use App\Fakex\model\Repository\ImageRepository;
class ControllerDefault {
    private static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }
    public static function default(){
        $modeles = (new ModeleRepository())->selectAll();
        self::afficheVue('testImage.php');
    }
    public static function error() : void {
        self::afficheVue('Error/generalError.html');
    }
}
?>