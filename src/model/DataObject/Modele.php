<?php
namespace App\Fakex\model\DataObject;
class Modele
{
    public int $idModele;
    public string $nom;
    public int $prix;
    public string $creator;
    public int $idImage;
    public Image $image;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return int
     */
    public function getIdImage(): int
    {
        return $this->idImage;
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
    public function getImage(): Image{
        return $this->image;
    }


    public function __construct(
        $idModele,
        $nom,
        $prix,
        $creator,
        $idImage,
        $image
    ){
        $this->idModele = $idModele;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->creator = $creator;
        $this->idImage=$idImage;
        $this->image=$image;
    }


}