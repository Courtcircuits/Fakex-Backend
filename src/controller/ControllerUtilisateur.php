<?php
namespace App\Fakex\controller;
use App\Fakex\model\Repository\ModeleRepository;
use App\Fakex\model\Repository\UtilisateurRepository;
class ControllerUtilisateur{
    private static function afficheVue(string $cheminVue, array $parametres = []) : void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require __DIR__ . "/../view/$cheminVue"; // Charge la vue
    }
    
    public static function connexionCreateur(){
        self::afficheVue('view.php',["pagetitle"=>"Connectez-vous"
        ,"cheminVueBody"=>"Utilisateur/connexionCreateur.php"]);
    }

    public static function connectedUtilisateur(){
        $login = $_GET['login'];
        $pwd = $_GET['password'];
        $result = (new UtilisateurRepository())->check($login,$pwd);
        if($result){
            self::afficheVue('view.php',["pagetitle"=>"Ajoutez votre produit"
            ,"cheminVueBody"=>"Produit/creationProduit.php"]);
        }
        else{
            self::afficheVue('view.php',["pagetitle"=>"Connectez-vous"
            ,"cheminVueBody"=>"Utilisateur/connexionCreateur.php","message"=>"Login ou mot de passe incorrect"]);
        }
    }

    public static function inscriptionCreateur(){
        self::afficheVue('view.php',["pagetitle"=>"Inscrivez-vous"
        ,"cheminVueBody"=>"Utilisateur/inscriptionCreateur.php"]);
    }
}
?>