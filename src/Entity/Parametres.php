<?php

namespace App\Entity;

use App\Repository\ParametresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name:'parametres')]
#[ORM\Entity(repositoryClass: ParametresRepository::class)]
class Parametres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'id')]
    private ?int $id = null;

    #[ORM\Column(name:'nomDdl',length: 255)]
    private ?string $nomDdl = null;

    #[ORM\Column(name:'adrRue1',length: 255)]
    private ?string $adrRue1 = null;

    #[ORM\Column(name:'adrRue2',length: 255, nullable: true)]
    private ?string $adrRue2 = null;

    #[ORM\Column(name:'cp',length: 5)]
    private ?string $cp = null;

    #[ORM\Column(name:'ville',length: 255)]
    private ?string $ville = null;

    #[ORM\Column(name:'tel',length: 14)]
    private ?string $tel = null;

    #[ORM\Column(name:'fax',length: 20)]
    private ?string $fax = null;

    #[ORM\Column(name:'mail',length: 255)]
    private ?string $mail = null;

    #[ORM\Column(name:'tarifInscription')]
    private ?float $tarifInscription = null;

    #[ORM\Column(name:'tarifRepasAccompagnant')]
    private ?float $tarifRepasAccompagnant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDdl(): ?string
    {
        return $this->nomDdl;
    }

    public function setNomDdl(string $nomDdl): self
    {
        $this->nomDdl = $nomDdl;

        return $this;
    }

    public function getAdrRue1(): ?string
    {
        return $this->adrRue1;
    }

    public function setAdrRue1(string $adrRue1): self
    {
        $this->adrRue1 = $adrRue1;

        return $this;
    }

    public function getAdrRue2(): ?string
    {
        return $this->adrRue2;
    }

    public function setAdrRue2(?string $adrRue2): self
    {
        $this->adrRue2 = $adrRue2;

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

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTarifInscription(): ?float
    {
        return $this->tarifInscription;
    }

    public function setTarifInscription(float $tarifInscription): self
    {
        $this->tarifInscription = $tarifInscription;

        return $this;
    }

    public function getTarifRepasAccompagnant(): ?float
    {
        return $this->tarifRepasAccompagnant;
    }

    public function setTarifRepasAccompagnant(float $tarifRepasAccompagnant): self
    {
        $this->tarifRepasAccompagnant = $tarifRepasAccompagnant;

        return $this;
    }
}
