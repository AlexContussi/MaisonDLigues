<?php

namespace App\Entity;

use App\Repository\NuiteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'nuite')]
#[ORM\Entity(repositoryClass: NuiteRepository::class)]
class Nuite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'id')]
    private ?int $id = null;

    #[ORM\Column(name:'dateStart',type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(name:'dateEnd',type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\ManyToOne(inversedBy: 'nuites')]
    #[ORM\JoinColumn(name:'hotel',nullable: false)]
    private ?Hotel $hotel = null;

    #[ORM\ManyToOne(inversedBy: 'nuites')]
    #[ORM\JoinColumn(name:'categorie',nullable: false)]
    private ?CategorieChambre $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'nuites')]
    private ?Inscription $inscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }
    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getHotel(): ?Hotel
    {
        return $this->hotel;
    }

    public function setHotel(?Hotel $hotel): self
    {
        $this->hotel = $hotel;

        return $this;
    }

    public function getCategorie(): ?CategorieChambre
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieChambre $categorie): self
    {
        $this->categorie = $categorie;

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
