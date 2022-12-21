<?php

namespace App\Fakex\model\DataObject;
/**
 * Cette classe simule un object modele
 *
 * <p>
 * L'objet modéle est crée avec l'information récoltée de notre Base De Données
 * C'est ainsi qu'on connecte notre BD au programme PHP
 * </p>
 */
class Modele
{
    public int|null $idModele;
    public string $nom;
    public int $prix;
    public string $creator;
    public string $imageUrl;
    public string $genre;

    public string $minSize;
    public string $maxSize;

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
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return MinSize as String
     */
    public function getMinSize(): string
    {
        return $this->minSize;
    }

    /**
     * @return MaxSize as String
     */
    public function getMaxSize(): string
    {
        return $this->maxSize;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function modeleAsJson(): array
    {
        return [
            'nom' => $this->nom,
            'prix' => $this->prix,
            'creator' => $this->creator,
            'imageUrl' => $this->imageUrl

        ];
    }

    public function __construct(
        $idModele,
        $nom,
        $prix,
        $creator,
        $imageUrl,
        $minSize,
        $maxSize,
        $genre
    )
    {
        $this->idModele = $idModele;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->creator = $creator;
        $this->imageUrl = $imageUrl;
        $this->minSize = $minSize;
        $this->maxSize = $maxSize;
        $this->genre = $genre;
    }


}