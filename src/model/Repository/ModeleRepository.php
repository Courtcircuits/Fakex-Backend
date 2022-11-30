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
                $listResult['imageBlob']
            );
        }
        return $liste;
    }
}
