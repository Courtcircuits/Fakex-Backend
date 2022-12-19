<?php

namespace App\Fakex\model\DataObject;

class Panier
{
    public Utilisateur $user;
    public array $listeModele;

    public function __construct(Utilisateur $user, array $listeModele)
    {
        $this->user = $user;
        $this->listeModele = $listeModele;
    }

    public function getUser(): Utilisateur
    {
        return $this->user;
    }

    public function getListeModele(): array
    {
        return $this->listeModele;
    }

}