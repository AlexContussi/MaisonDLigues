<?php

namespace App\Entity;

use App\Repository\LicencieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'licencie')]
#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private ?int $id = null;

    #[ORM\Column(name:'numlicence',length: 12)]
    private ?string $numlicence = null;

    #[ORM\Column(name:'nom',length: 255)]
    private ?string $nom = null;

    #[ORM\Column(name:'prenom',length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(name:'adresse1',length: 255)]
    private ?string $adresse1 = null;

    #[ORM\Column(name:'adresse2',length: 255, nullable: true)]
    private ?string $adresse2 = null;

    #[ORM\Column(name:'cp',length: 5)]
    private ?string $cp = null;

    #[ORM\Column(name:'ville',length: 255)]
    private ?string $ville = null;

    #[ORM\Column(name:'tel',length: 14, nullable: true)]
    private ?string $tel = null;

    #[ORM\Column(name:'mail',length: 255, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(name:'dateAdhesion',type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAdhesion = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Qualite $qualite = null;

    #[ORM\ManyToOne(inversedBy: 'licencies')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Club $club = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(string $adresse1): self
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): self
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getDateAdhesion(): ?\DateTimeInterface
    {
        return $this->dateAdhesion;
    }

    public function setDateAdhesion(\DateTimeInterface $dateAdhesion): self
    {
        $this->dateAdhesion = $dateAdhesion;

        return $this;
    }

    public function getQualite(): ?Qualite
    {
        return $this->qualite;
    }

    public function setQualite(?Qualite $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): self
    {
        $this->club = $club;

        return $this;
    }
}
