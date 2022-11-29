<?php
namespace App\Fakex\model\Repository;
use App\Fakex\model\DataObject\Image;
use PDO;

class ImageRepository
{
    public static function select(string $idImage) : Image{
        $sql = "SELECT * FROM Image WHERE imageID = :idImageTag";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $values = array(
            "idImageTag" => $idImage
        );
        $pdoStatement->execute($values);
        $rs = $pdoStatement->fetch();
        $pdoStatement->setFetchMode(PDO::FETCH_NUM);
        return new Image(
            $rs[0],
            $rs[1],
            $rs[2],
            $rs[3]
        );
    }

    public static function selectAll() : array{
        $sql = "SELECT * FROM Image;";
        $pdoStatement = DatabaseConnection::getPdo()->prepare($sql);
        $pdoStatement->execute();

        $dataObject = null;
        $i = 0;
        $pdoStatement->setFetchMode(PDO::FETCH_NUM);
        foreach ($pdoStatement as $dataObjectFormatTableau) {
            $dataObject[$i] = new Image(
                $dataObjectFormatTableau[0],
                $dataObjectFormatTableau[1],
                $dataObjectFormatTableau[2],
                $dataObjectFormatTableau[3]);
            $i++;
        }
        return $dataObject;
    }
}

?>