<?php

namespace App\Entity;

use App\Repository\VacationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'vacation')]
#[ORM\Entity(repositoryClass: VacationRepository::class)]
class Vacation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'id')]
    private ?int $id = null;

    #[ORM\Column(name:'dateheureDebut',type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateheureDebut = null;

    #[ORM\Column(name:'dateheureFin',type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateheureFin = null;

    #[ORM\ManyToOne(inversedBy: 'vacations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Atelier $atelier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateheureDebut(): ?\DateTimeInterface
    {
        return $this->dateheureDebut;
    }

    public function setDateheureDebut(\DateTimeInterface $dateheureDebut): self
    {
        $this->dateheureDebut = $dateheureDebut;

        return $this;
    }

    public function getDateheureFin(): ?\DateTimeInterface
    {
        return $this->dateheureFin;
    }

    public function setDateheureFin(\DateTimeInterface $dateheureFin): self
    {
        $this->dateheureFin = $dateheureFin;

        return $this;
    }

    public function getAtelier(): ?Atelier
    {
        return $this->atelier;
    }

    public function setAtelier(?Atelier $atelier): self
    {
        $this->atelier = $atelier;

        return $this;
    }
}
