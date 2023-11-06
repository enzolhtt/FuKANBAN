<?php

namespace App\Entity;

use App\Repository\ProjetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetsRepository::class)]
class Projets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomProjet = null;

    #[ORM\Column(length: 255)]
    private ?string $DescriptionProjet = null;

    #[ORM\ManyToOne(inversedBy: 'projets')]
    private ?Utilisateurs $NomCreateur = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateModification = null;

    #[ORM\OneToMany(mappedBy: 'NomProjet', targetEntity: Taches::class)]
    private Collection $taches;

    public function __construct()
    {
        $this->taches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProjet(): ?string
    {
        return $this->NomProjet;
    }

    public function setNomProjet(string $NomProjet): static
    {
        $this->NomProjet = $NomProjet;

        return $this;
    }

    public function getDescriptionProjet(): ?string
    {
        return $this->DescriptionProjet;
    }

    public function setDescriptionProjet(string $DescriptionProjet): static
    {
        $this->DescriptionProjet = $DescriptionProjet;

        return $this;
    }

    public function getNomCreateur(): ?Utilisateurs
    {
        return $this->NomCreateur;
    }

    public function setNomCreateur(?Utilisateurs $NomCreateur): static
    {
        $this->NomCreateur = $NomCreateur;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): static
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->DateModification;
    }

    public function setDateModification(\DateTimeInterface $DateModification): static
    {
        $this->DateModification = $DateModification;

        return $this;
    }

    /**
     * @return Collection<int, Taches>
     */
    public function getTaches(): Collection
    {
        return $this->taches;
    }

    public function addTach(Taches $tach): static
    {
        if (!$this->taches->contains($tach)) {
            $this->taches->add($tach);
            $tach->setNomProjet($this);
        }

        return $this;
    }

    public function removeTach(Taches $tach): static
    {
        if ($this->taches->removeElement($tach)) {
            // set the owning side to null (unless already changed)
            if ($tach->getNomProjet() === $this) {
                $tach->setNomProjet(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->NomProjet;
    }
}
