<?php
namespace App\Fakex\model\Repository;
use App\Fakex\model\DataObject\Modele;

class UtilisateurRepository
{
    public function check($login,$pwd): bool{
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM utilisateur where login = :loginTag and password = :passwordTag and createur = 1";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $login
            ,'passwordTag' => $pwd
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetch();
        if(!$result) {
            return false;
        }
        else {
            return true;
        }
    }

    public function getCreateur($login): string
    {
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM utilisateur where login = :loginTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $login
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        return $result[0]['nomCreateur'];
    }
}

?>