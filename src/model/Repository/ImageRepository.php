<?php
namespace App\Fakex\model\Repository;
use App\Fakex\model\DataObject\Image;
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
        return new Image(
            $rs['nom'],
            $rs['imageID'],
            $rs['taille'],
            $rs['ImageBlob']
        );
    }
}

?>