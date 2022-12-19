<?php

class PanierRepository
{
    public function getPanier(Utilisateur $user): Panier
    {
        $sql = "SELECT idProduit FROM Panier WHERE idUtilisateur = :idUtilisateur";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute(['idUtilisateur' => $user->getIdUtilisateur()]);
        $listeModele = [];
        foreach ($pdoStatement as $listResult) {
            $listeModele[] = $listResult['idProduit'];
        }
        return new Panier($user, $listeModele);
    }

    public function addProduit(Utilisateur $user): void
    {
        $sqlBis = "SELECT MAX(idModele) FROM Modele";
        $pdoStatementBis = DatabaseConnection::getPdo()->prepare($sqlBis);
        $pdoStatementBis->execute();
        $idModele = $pdoStatementBis->fetch();
        $sql = "INSERT INTO Panier (idUtilisateur, idProduit) VALUES (:idUtilisateur, :idModele)";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute(['idUtilisateur' => $user->getIdUtilisateur(), 'idModele' => $idModele]);
    }
}