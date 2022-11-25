<?php

class Image
{
    private string $imageID;
    private string $nom;
    private int $taille;
    private string $url;
    private string $blob;

    /**
     * @return string
     */
    public function getImageID(): string
    {
        return $this->imageID;
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
    public function getTaille(): int
    {
        return $this->taille;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getBlob(): string
    {
        return $this->blob;
    }
    public function __construct(string $imageID, string $nom, string $taille,string $url, string $blob)
    {
        $this->imageID = $imageID;
        $this->nom=$nom;
        $this->taille=$taille;
        $this->url=$url;
        $this->blob=$blob;
    }
}