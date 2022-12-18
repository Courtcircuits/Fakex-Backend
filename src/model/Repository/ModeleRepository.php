<?php
namespace App\Fakex\model\Repository;
use App\Fakex\model\DataObject\Modele;
use App\Fakex\model\Repository\ImageRepository;
class ModeleRepository
{
    public function selectAll(): array{
        $liste = array();
        $pdoStatement = DatabaseConnection::getPdo()->query("SELECT * FROM Modele");
        //$voitureFormatTableau = $pdoStatement->fetch();
        foreach ($pdoStatement as $listResult) {
            $liste[] = new Modele(
                $listResult['idModele'],
                $listResult['nom'],
                $listResult['prix'],
                $listResult['creator'],
                $listResult['imageBlob'],
                $listResult['minSize'],
                $listResult['maxSize'],
                $listResult['genre']
            );
        }
        return $liste;
    }

    public function selectMen(): array{
        $liste = array();
        $pdoStatement = DatabaseConnection::getPdo()->query("SELECT * FROM Modele WHERE genre in ('H','H/F')");
        //$voitureFormatTableau = $pdoStatement->fetch();
        foreach ($pdoStatement as $listResult) {
            $liste[] = new Modele(
                $listResult['idModele'],
                $listResult['nom'],
                $listResult['prix'],
                $listResult['creator'],
                $listResult['imageBlob'],
                $listResult['minSize'],
                $listResult['maxSize'],
                $listResult['genre']
            );
        }
        return $liste;
    }

    public function selectWomen(){
        $liste = array();
        $pdoStatement = DatabaseConnection::getPdo()->query("SELECT * FROM Modele WHERE genre in ('F','H/F')");
        //$voitureFormatTableau = $pdoStatement->fetch();
        foreach ($pdoStatement as $listResult) {
            $liste[] = new Modele(
                $listResult['idModele'],
                $listResult['nom'],
                $listResult['prix'],
                $listResult['creator'],
                $listResult['imageBlob'],
                $listResult['minSize'],
                $listResult['maxSize'],
                $listResult['genre']
            );
        }
        return $liste;
    }

    public function selectOne(String $chaussure):Modele{
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM Modele WHERE nom = :nomTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'nomTag' => $chaussure
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetch();
        $modele = new Modele(
            $result['idModele'],
            $result['nom'],
            $result['prix'],
            $result['creator'],
            $result['imageBlob'],
            $result['minSize'],
            $result['maxSize'],
            $result['genre']
        );
        return $modele;
    }

    public function createShoe(Modele $shoe){
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "INSERT INTO Modele (idModele, nom, prix, creator, imageBlob, minSize,maxSize, genre) VALUES (NULL, :nomTag, :prixTag, :creatorTag, :imageBlobTag, :minSizeTag, :maxSizeTag, :genreTag)";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'nomTag' => $shoe->getNom(),
            'prixTag' => $shoe->getPrix(),
            'creatorTag' => $shoe->getCreator(),
            'imageBlobTag' => $shoe->getImageBlob(),
            'minSizeTag' => $shoe->getMinSize(),
            'maxSizeTag' => $shoe->getMaxSize(),
            'genreTag' => $shoe->getGenre()
        );
        $pdoStatement->execute($values);
    }

    public function recommandShoe($pattern):array{
        $pdoStatement = DatabaseConnection::getPdo();
        $pattern = '%'.$pattern.'%';
        $sql = "SELECT nom FROM Modele WHERE nom LIKE :pattern";
        $pdoStatement = $pdoStatement->prepare($sql);
        $values = [
            'pattern' => $pattern
        ];
        $pdoStatement->execute($values);
        $resultset = $pdoStatement->fetchAll();
        $toreturn = [];
        foreach ($resultset as $row){
            $toreturn[] = $row['nom'];
        }
        return $toreturn;
    }

    public function add(Modele $modele):void{
        $pdoStatement = DatabaseConnection::getPdo()->prepare("INSERT INTO Modele (nom, prix, creator, imageBlob, minSize, maxSize) VALUES (:nom, :prix, :creator, :imageBlob, :minSize, :maxSize)");
        $pdoStatement->execute([
            'nom' => $modele->getNom(),
            'prix' => $modele->getPrix(),
            'creator' => $modele->getCreator(),
            'imageBlob' => $modele->getImageBlob(),
            'minSize' => $modele->getMinSize(),
            'maxSize' => $modele->getMaxSize()
        ]);

    }
}
