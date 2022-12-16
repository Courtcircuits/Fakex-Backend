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

    public function createShoe( $nom, $prix, $creator, $imageBlob, $minSize, $maxSize, $genre){
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "INSERT INTO Modele (nom,prix,creator,imageBlob,minSize,maxSize,genre) VALUES (:nomTag,:prixTag,:creatorTag,:imageBlobTag,:minSizeTag,:maxSizeTag,:genreTag)";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'nomTag' => $_POST['nom'],
            'prixTag' => $_POST['prix'],
            'creatorTag' => $_POST['creator'],
            'imageBlobTag' => $_POST['imageBlob'],
            'minSizeTag' => $_POST['minSize'],
            'maxSizeTag' => $_POST['maxSize'],
            'genreTag' => $_POST['genre']
        );
        $pdoStatement->execute($values);
    }

    public function recommandShoe($pattern):array{
        $pdoStatement = DatabaseConnection::getPdo();
        $pattern = '%'.$pattern.'%';
        $sql = "SELECT * FROM Modele WHERE nom LIKE :pattern";
        $pdoStatement = $pdoStatement->prepare($sql);
        $values = [
            'pattern' => $pattern
        ];
        $pdoStatement->execute($values);
        $resultset = $pdoStatement->fetchAll();
        $toreturn = [];
        var_dump($resultset);
        foreach ($resultset as $row){
            $toreturn[] = $row['nom'];
            echo $row['nom'];
        }
        return $toreturn;
    }
}
