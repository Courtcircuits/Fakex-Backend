<?php
namespace App\Fakex\controller;
use App\Fakex\model\DataObject\Utilisateur;
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

    public static function connexionUtilisateur(){
        self::afficheVue('view.php',["pagetitle"=>"Connectez-vous"
        ,"cheminVueBody"=>"Utilisateur/connexionUtilisateur.php"]);
    }

    public static function connectedUtilisateurCreateur(){
        $login = $_GET['login'];
        $pwd = $_GET['password'];
        $result = (new UtilisateurRepository())->checkCreateur($login,$pwd);
        if($result){
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['logged_in']= true;
            $createur = (new UtilisateurRepository())->getCreateur($login);
            self::afficheVue('view.php',["pagetitle"=>"Ajoutez votre produit"
            ,"cheminVueBody"=>"Produit/creationProduit.php","nomCreateur"=> $createur]);
        }
        else{
            self::afficheVue('view.php',["pagetitle"=>"Connectez-vous [Createur]"
            ,"cheminVueBody"=>"Utilisateur/connexionCreateur.php","message"=>"Login ou mot de passe incorrect/Vous n'êtes peut être pas créateur"]);
        }
    }

    public static function connectedUtilisateurLambda(){
        $login = $_GET['login'];
        $pwd = $_GET['password'];
        $result = (new UtilisateurRepository())->checkGlobal($login,$pwd);
        if($result){
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['logged_in']= true;
            ControllerModele::readAll();
        }
        else{
            self::afficheVue('view.php',["pagetitle"=>"Connectez-vous"
            ,"cheminVueBody"=>"Utilisateur/connexionUtilisateur.php","message"=>"Login ou mot de passe incorrect"]);
        }
    }

    public static function inscriptionCreateur(){
        self::afficheVue('view.php',["pagetitle"=>"Inscrivez-vous"
        ,"cheminVueBody"=>"Utilisateur/inscriptionCreateur.php"]);
    }

    public static function created(){
        $user = new Utilisateur(1,$_GET['nom'],$_GET['prenom'],$_GET['login'],$_GET['password'],$_GET['email']);
        var_dump($_GET);
        (new UtilisateurRepository())->add($user);

    }

    public static function deconnexion(){
        session_start();
        session_destroy();
        session_unset();
        ControllerModele::readAll();
       
    }
}
?>