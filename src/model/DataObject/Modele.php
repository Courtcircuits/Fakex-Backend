<?php
namespace App\Fakex\model\DataObject;
class Modele
{
    public int $idModele;
    public string $nom;
    public int $prix;
    public string $creator;
    public $imageBlob;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getCreator(): string
    {
        return $this->creator;
    }

    /**
     * @return int
     */
    public function getIdModele(): int
    {
        return $this->idModele;
    }

    /**
     * @return int
     */
    public function getPrix(): int
    {
        return $this->prix;
    }

    /**
     * @return Image
     */
    public function getImageBlob(): string{
        return $this->imageBlob;
    }


    public function __construct(
        $idModele,
        $nom,
        $prix,
        $creator,
        $imageBlob
    ){
        $this->idModele = $idModele;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->creator = $creator;
        $this->imageBlob = $imageBlob;
    }


}