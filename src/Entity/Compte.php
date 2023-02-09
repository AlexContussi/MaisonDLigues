<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'compte')]
#[ORM\Entity(repositoryClass: CompteRepository::class)]
class Compte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private ?int $id = null;

    #[ORM\Column(name:'email',length: 255)]
    private ?string $email = null;

    #[ORM\Column(name: 'numlicence')]
    private ?int $numlicence = null;

    #[ORM\Column(name:'password',length: 255)]
    private ?string $password = null;

    #[ORM\Column(name:'roles',length: 255)]
    private ?string $roles = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Inscription $inscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNumlicence(): ?int
    {
        return $this->numlicence;
    }

    public function setNumlicence(int $numlicence): self
    {
        $this->numlicence = $numlicence;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getInscription(): ?Inscription
    {
        return $this->inscription;
    }

    public function setInscription(?Inscription $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }
}
