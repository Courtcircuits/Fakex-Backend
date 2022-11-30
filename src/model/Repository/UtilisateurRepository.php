<?php
namespace App\Fakex\model\Repository;
use App\Fakex\model\DataObject\Modele;

class UtilisateurRepository
{
    public function check($login,$pwd){
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM utilisateur WHERE login = :loginTag"; 
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $login
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetch();
        $result = password_verify($pwd,$result['password']);
        var_dump($result);
        var_dump($result['createur']);
        if($result['createur']){
            return false;
        }
        else{
            if(password_verify($pwd,$result['password'])){
                return true;
            }
        }
        return false;
    }
    
}

?>