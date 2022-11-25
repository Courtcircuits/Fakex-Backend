<?php

class Modele
{
    private int $idModele;
    private string $nom;
    private int $prix;
    private string $creator;
    private int $idImage;

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
    public function __construct(
        $idModele,
        $nom,
        $prix,
        $creator,
        $idImage
    ){
        $this->idModele = $idModele;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->creator = $creator;
        $this->idImage=$idImage;
    }


}