<?php
namespace App\Fakex\model\Repository;
use App\Fakex\model\DataObject\Modele;
use App\Fakex\model\Repository\ImageRepository;

/**
 * Cette classe a pour objectif de gerer les requetes d'une base de Données spécifique :
 * <p>
 * Modele
 * </p>
 *
 * Elle forme partie d'une architecture de programmation en couches
 * <ul>
 *  <li>Elle gère les selections </li>
 * <li> Les creations des modèles</li>
 * <li> L'elimination des modèles</li>
 * <li> et les altérations des modèles</li>
 *
 * </ul>
 */
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
                $listResult['imageUrl'],
                $listResult['minSize'],
                $listResult['maxSize'],
                $listResult['genre'],
                $listResult['quantity']
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
                $listResult['imageUrl'],
                $listResult['minSize'],
                $listResult['maxSize'],
                $listResult['genre'],
                $listResult['quantity']
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
                $listResult['imageUrl'],
                $listResult['minSize'],
                $listResult['maxSize'],
                $listResult['genre'],
                $listResult['quantity']
            );
        }
        return $liste;
    }

    public function selectOne(int $chaussureID):Modele{
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "SELECT * FROM Modele WHERE idModele = :idTag";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'idTag' => $chaussureID
        );
        $pdoStatement->execute($values);
        $result = $pdoStatement->fetch();
        $modele = new Modele(
            $result['idModele'],
            $result['nom'],
            $result['prix'],
            $result['creator'],
            $result['imageUrl'],
            $result['minSize'],
            $result['maxSize'],
            $result['genre'],
            $result['quantity']
        );
        return $modele;
    }

    public function createShoe(Modele $shoe){
        $pdoStatement = DatabaseConnection::getPdo();
        $requete = "INSERT INTO Modele (idModele, nom, prix, creator, imageUrl, minSize,maxSize, genre, quantity) 
        VALUES (NULL, :nomTag, :prixTag, :creatorTag, :imageUrl, :minSizeTag, :maxSizeTag, :genreTag, :quantityTag)";
        $pdoStatement = $pdoStatement->prepare($requete);
        $values = array(
            'nomTag' => $shoe->getNom(),
            'prixTag' => $shoe->getPrix(),
            'creatorTag' => $shoe->getCreator(),
            'imageUrl' => $shoe->getImageUrl(),
            'minSizeTag' => $shoe->getMinSize(),
            'maxSizeTag' => $shoe->getMaxSize(),
            'genreTag' => $shoe->getGenre(),
            'quantityTag' => $shoe->getQuantity()
        );
        $pdoStatement->execute($values);
    }

    public function getBestSeller(int $rank): array{

        $sql = 'SELECT * FROM Modele m JOIN LigneCommande l ON l.idModele=m.idModele GROUP BY m.idModele ORDER BY COUNT(m.idModele) DESC LIMIT :rankTag, 1';
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($sql);
        $pdoStatement->bindParam(':rankTag', $rank, \PDO::PARAM_INT);


        $pdoStatement->execute();
        $result = $pdoStatement->fetch();

        $sql = 'SELECT * FROM Modele WHERE creator=:creatorTag LIMIT 3';
        $pdoStatement = DatabaseConnection::getPdo();
        $pdoStatement = $pdoStatement->prepare($sql);
        $pdoStatement->execute(array(
            'creatorTag' => $result['creator']
        ));

        $resultb = $pdoStatement->fetchAll();
        $liste = array();
        foreach ($resultb as $resultset){
            $liste[] = [
              "image" => $resultset['imageUrl']
            ];
        }

        return [
            "nom" => $result['nom'],
            "prix" => $result['prix'],
            "creator" => $result['creator'],
            "image" => $result['imageUrl'],
            "others"=>$liste
        ];
    }

    /**
     * Cette méthode cherche toutes les chaussures qui ont un même pattern
     * Autrement dit, on cherche toutes les mêmes chaussures dans la BD?
     *
     * (A spécifier ) 🤞
     * @param $pattern
     * @return array
     */
    public function recommandShoe($pattern):array{
        $pdoStatement = DatabaseConnection::getPdo();
        $pattern = '%'.$pattern.'%';
        $sql = "SELECT idModele,nom FROM Modele WHERE nom LIKE :pattern";
        $pdoStatement = $pdoStatement->prepare($sql);
        $values = [
            'pattern' => $pattern
        ];
        $pdoStatement->execute($values);
        $resultset = $pdoStatement->fetchAll();
        $toreturn = [];
        foreach ($resultset as $row){
            $toreturn[] = ["nom" => $row['nom'], "id" => $row['idModele']];
        }
        return $toreturn;
    }


}
