<?php

namespace App\Fakex\model\Repository;

use App\Fakex\model\DataObject\Modele;
use App\Fakex\model\DataObject\Utilisateur;
use http\Client\Curl\User;
use LDAP\Result;
use Serializable;

class UtilisateurRepository
{
    public function addUtilisateur(Utilisateur $creator)
    {
        $pdoStatement = DatabaseConnection::getPdo()->prepare("INSERT INTO utilisateur(login, password,mail,nom,prenom, createur, nomCreateur) VALUES (:login, :password, :email, :nom, :prenom, :createur, :login)");
        $pdoStatement->execute([
            "login" => $creator->getLogin(),
            "password" => $creator->getPassword(),
            "createur" => $creator->getCreator(),
            "email" => $creator->getEmail(),
            "nom" => $creator->getNom(),
            "prenom" => $creator->getPrenom()
        ]);
        $requete = "INSERT INTO Panier(idUtilisateur) VALUES (:idUtilisateur)";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($requete);
        $pdoStatement->execute([
            "idUtilisateur" => $creator->getIdUtilisateur(),
        ]);

    }

    public function checkCreateur($login, $pwd): bool
    {
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM utilisateur where login = :loginTag and password = :passwordTag and createur = 1";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $login
        , 'passwordTag' => $pwd
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetch();
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    public function checkGlobal($login, $pwd): bool
    {
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM utilisateur where login = :loginTag and password = :passwordTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $login
        , 'passwordTag' => $pwd
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetch();
        if (!$result) {
            return false;
        } else {
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


    public function getUser($login): Utilisateur
    {
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM utilisateur where login = :loginTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $login
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        return new Utilisateur($result[0]['nomCreateur'],$result[0]['nom'],$result[0]['prenom'],$result[0]['login'],$result[0]['password'],$result[0]['mail'],$result[0]['mailToValidate'],$result[0]['nonce']);
    }

    public function ajoutProd($idModele)
    {
        session_start();
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT idUtilisateur FROM utilisateur where login = :loginTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $_SESSION['login']
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        $requete = "Select idPanier from Panier where idUtilisateur = :idUtilisateur";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'idUtilisateur' => $result[0]['idUtilisateur']
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        $requete = "INSERT INTO LigneCommande (idPanier, idModele) VALUES (:idPanier, :idModele)";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'idPanier' => $result[0]['idPanier'],
            'idModele' => $idModele,);
        $pdoStatement->execute($values);

    }

    public function suprProd($idModele)
    {
        session_start();
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT idUtilisateur FROM utilisateur WHERE login= :loginTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $_SESSION['login']
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        $requete = "Select idPanier from Panier where idUtilisateur = :idUtilisateur";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'idUtilisateur' => $result[0]['idUtilisateur']
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        //DELETE FROM LigneCommande WHERE
        //LigneCommandeID = (SELECT MIN(LigneCommandeID) FROM LigneCommande
        //	WHERE idPanier = 8 AND idModele = 10)
        //AND idPanier = 8
        //AND idModele = 10;
        $requete = "DELETE FROM LigneCommande WHERE LigneCommandeID = 
                                (SELECT MIN(LigneCommandeID) FROM LigneCommande
        	WHERE idPanier = :idPanier AND idModele = :idModele)
            AND idPanier = :idPanier 
            AND idModele = :idModele";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'idPanier' => $result[0]['idPanier'],
            'idModele' => $idModele,);
        $pdoStatement->execute($values);

    }

    public static function getProdPanier(): array
    {
        if (isset($_SESSION['login'])) {
            $pdoStatement = DatabaseConnection::getPdo();
            $requete = "SELECT idUtilisateur FROM utilisateur where login = :loginTag";
            $pdoStatement = $pdoStatement->prepare($requete);

            $values = array(
                'loginTag' => $_SESSION['login']
            );
            $pdoStatement->execute($values);
            $result = $pdoStatement->fetchAll();
            $requete = "Select idPanier from Panier where idUtilisateur = :idUtilisateur";
            $pdoStatement = DatabaseConnection::getPdo();
            $pdoStatement = $pdoStatement->prepare($requete);
            $values = array(
                'idUtilisateur' => $result[0]['idUtilisateur']
            );
            $pdoStatement->execute($values);
            $result = $pdoStatement->fetchAll();
            $requete = "Select idModele from LigneCommande where idPanier = :idPanier";
            $pdoStatement = DatabaseConnection::getPdo();
            $pdoStatement = $pdoStatement->prepare($requete);
            $values = array(
                'idPanier' => $result[0]['idPanier']
            );
            $pdoStatement->execute($values);
            $liste = array();
            foreach ($pdoStatement as $listResult) {
                $requete = "Select * from Modele where idModele = :idModele";
                $pdoStatement = DatabaseConnection::getPdo();
                $pdoStatement = $pdoStatement->prepare($requete);
                $values = array(
                    'idModele' => $listResult['idModele']
                );
                $pdoStatement->execute($values);
                $result = $pdoStatement->fetchAll();
                $liste[] = new Modele(
                    $result[0]['idModele'],
                    $result[0]['nom'],
                    $result[0]['prix'],
                    $result[0]['creator'],
                    $result[0]['imageUrl'],
                    $result[0]['minSize'],
                    $result[0]['maxSize'],
                    $result[0]['genre'],
                    $result[0]['quantity']
                );
            }
            return $liste;
        }
        return [];


    }

    public static function getSumPanier(): int
    {
        $sql = "SELECT SUM(m.prix) as total FROM Modele m JOIN LigneCommande l ON l.idModele = m.idModele JOIN Panier p ON p.idPanier = l.idPanier JOIN utilisateur u on p.idUtilisateur = u.idUtilisateur WHERE u.login  = :login";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($sql);
        $values = array(
            'login' => $_SESSION['login']
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        return $result[0]['total'];
    }
}


?>