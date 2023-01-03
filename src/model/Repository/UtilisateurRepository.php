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
        $pdoStatement = DatabaseConnection::getPdo()->prepare
        ("INSERT INTO utilisateur(login, password,mail,nom,prenom, createur, nomCreateur, mailToValidate, nonce) VALUES (:login, :password, :email, :nom, :prenom, :createur, :login, :mailToValidate, :nonce)");
        $pdoStatement->execute([
            "login" => $creator->getLogin(),
            "password" => $creator->getPassword(),
            "createur" => $creator->getCreator(),
            "email" => $creator->getEmail(),
            "nom" => $creator->getNom(),
            "prenom" => $creator->getPrenom(),
            "mailToValidate" => $creator->getEmailToValidate(),
            "nonce" => $creator->getNonce()
        ]);

        //get idUtilisateur from database
        $pdoStatement = DatabaseConnection::getPdo()->prepare("SELECT idUtilisateur FROM utilisateur WHERE login = :login");
        $pdoStatement->execute([
            "login" => $creator->getLogin()
        ]);
        $result = $pdoStatement->fetch();
        $creator->setIdUtilisateur($result['idUtilisateur']);


        $requete = "INSERT INTO Panier(idUtilisateur) VALUES (:idUtilisateur)";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($requete);
        $pdoStatement->execute([
            "idUtilisateur" => $creator->getIdUtilisateur()
        ]);

    }
    public static function deleteUtilisateur($idUtilisateur){
        $pdoStatement = DatabaseConnection::getPdo()->prepare("DELETE FROM utilisateur WHERE idUtilisateur = :idUtilisateur");
        $pdoStatement->execute([
            "idUtilisateur" => $idUtilisateur
        ]);
    }
    public static function updateUtilisateur(Utilisateur $creator){
        $pdoStatement = DatabaseConnection::getPdo()->prepare("UPDATE utilisateur SET  " );

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


    public function getUser($login): Utilisateur|null
    {
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM utilisateur where login = :loginTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'loginTag' => $login
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetchAll();
        if (!$result) {
            return null;
        }
        return new Utilisateur(1,$result[0]['nom'],$result[0]['prenom'],$result[0]['login'],$result[0]['password'],$result[0]['mail'],$result[0]['mailToValidate'],$result[0]['nonce']);
    }


    public function ajoutProd($idModele)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
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
        $requete = "INSERT INTO LigneCommande (idPanier, idModele, quantity, taille) VALUES (:idPanier, :idModele, :quantity, :taille)";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'idPanier' => $result[0]['idPanier'],
            'idModele' => $idModele,
            'quantity' => $_GET['quantity'],
            'taille' => $_GET['size']
        );
        $pdoStatement->execute($values);

    }

    public function suprProd($idModele)
    {
        if(!isset($_SESSION)){
            session_start();
        }
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
            $requete = "SELECT m.idModele, m.nom, m.prix, m.imageUrl, l.quantity, l.taille FROM LigneCommande l
JOIN Modele m ON m.idModele=l.idModele
JOIN Panier p ON p.idPanier = l.idPanier
JOIN utilisateur u ON p.idUtilisateur = u.idUtilisateur
WHERE u.login=:idUtilisateur";
            $pdoStatement = $pdoStatement->prepare($requete);
            $values = array(
                'idUtilisateur' => $_SESSION['login']
            );
            $pdoStatement->execute($values);
            return $pdoStatement->fetchAll();
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

    public function checkNonce($login, $nonce): bool
    {
        return $this->getUser($login)->getNonce() == $nonce;
    }


    public function validerEmail($login)
    {
        $sql = "UPDATE utilisateur SET emailValide = 1 WHERE login = :login";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($sql);
        $values = array(
            'login' => $login
        );
        $pdoStatement->execute($values);
    }

    public function delete($login)
    {
        $sql = "DELETE FROM utilisateur WHERE login = :login";
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($sql);
        $values = array(
            'login' => $login
        );
        $pdoStatement->execute($values);
    }
}


?>