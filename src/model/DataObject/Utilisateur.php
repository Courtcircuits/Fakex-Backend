<?php
namespace App\Fakex\model\DataObject;
class Utilisateur
{
    public int $createur;
    public string $nom;
    public string $prenom;
    public string $login;
    public string $password;
    public string $email;
    public int $idUtilisateur;

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
    public function getCreator(): int
    {
        return $this->createur;
    }

    /**
     * @return int
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string{
        return $this->password;
    }

    public function getEmail(): string  {
        return $this->email;
    }

    public function getIdUtilisateur(): int{
        return $this->idUtilisateur;
    }

    public function __construct($createur,$nom,$prenom,$login,$password,$email){
        $this->createur = $createur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }
}
?>