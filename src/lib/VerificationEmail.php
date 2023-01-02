<?php

namespace App\Fakex\Lib;

use App\Fakex\config\Conf;
use App\Fakex\model\DataObject\Utilisateur;
use App\Fakex\model\Repository\UtilisateurRepository;

class VerificationEmail
{
    public static function envoiEmailValidation(Utilisateur $user):void{
        $loginURL = rawurlencode($user->getLogin());
        $nonce = rawurlencode($user->getNonce());
        $absoluteURL = Conf::getAbsoluteURL();
        $url = "$absoluteURL/?action=validerEmail&controller=utilisateur&login=$loginURL&nonce=$nonce";
        $msg = "Bonjour, veuillez cliquer sur le lien suivant pour valider votre adresse email : $url";
    }

    public static function traiterEmailValidation(){
        $login = $_GET['login'];
        $nonce = $_GET['nonce'];
        $user = (new UtilisateurRepository())->getUser($login);
        if($user->getNonce() == $nonce){
            $user->setEmail($user->getEmailToValidate());
            $user->setNonce(null);
            $user->setEmailToValidate(null);
            (new UtilisateurRepository())->addUtilisateur($user);
        }
    }
}