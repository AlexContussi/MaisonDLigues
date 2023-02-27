<?php

namespace App\Entity;

use App\Repository\QualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'qualite')]
#[ORM\Entity(repositoryClass: QualiteRepository::class)]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'id')]
    private ?int $id = null;

    #[ORM\Column(name:'libelleQualite',length: 255)]
    private ?string $libelleQualite = null;

    #[ORM\OneToMany(mappedBy: 'qualite', targetEntity: Licencie::class)]
    private Collection $licencies;

    public function __construct()
    {
        $this->licencies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleQualite(): ?string
    {
        return $this->libelleQualite;
    }

    public function setLibelleQualite(string $libelleQualite): self
    {
        $this->libelleQualite = $libelleQualite;

        return $this;
    }

    /**
     * @return Collection<int, Licencie>
     */
    public function getLicencies(): Collection
    {
        return $this->licencies;
    }

    public function addLicency(Licencie $licency): self
    {
        if (!$this->licencies->contains($licency)) {
            $this->licencies->add($licency);
            $licency->setQualite($this);
        }

        return $this;
    }

    public function removeLicency(Licencie $licency): self
    {
        if ($this->licencies->removeElement($licency)) {
            // set the owning side to null (unless already changed)
            if ($licency->getQualite() === $this) {
                $licency->setQualite(null);
            }
        }

        return $this;
    }
}
