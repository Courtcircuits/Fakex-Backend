<?php
namespace App\Fakex\model\DataObject;
class Image
{
    public string $nom;
    public int $taille;
    public int $idImage;
    public string $blob;

    public function getBlob(): string{
        return $this->blob;
    }

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
     * @return int
     */
    public function getTaille(): int
    {
        return $this->taille;
    }

    public function __construct(
        $idImage,
        $taille,
        $nom,
        $blob
    ){
        $this->nom = $nom;
        $this->idImage=$idImage;
        $this->taille=$taille;
        $this->blob=$blob;
    }


}