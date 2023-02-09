<?php

namespace App\Entity;

use App\Repository\ProposerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'proposer')]
#[ORM\Entity(repositoryClass: ProposerRepository::class)]
class Proposer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'id')]
    private ?int $id = null;

    #[ORM\Column(name:'tarifNuite')]
    private ?float $tarifNuite = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    #[ORM\JoinColumn(name:'hotel',nullable: false)]
    private ?Hotel $hotel = null;

    #[ORM\ManyToOne(inversedBy: 'tarifs')]
    #[ORM\JoinColumn(name:'categorie',nullable: false)]
    private ?CategorieChambre $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTarifNuite(): ?float
    {
        return $this->tarifNuite;
    }

    public function setTarifNuite(float $tarifNuite): self
    {
        $this->tarifNuite = $tarifNuite;

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
}
