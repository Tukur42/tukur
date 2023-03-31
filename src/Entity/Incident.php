<?php

namespace App\Entity;

use App\Repository\IncidentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncidentRepository::class)]
class Incident
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 100)]
    private ?string $nomIncident = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $utilisateur = null;

    #[ORM\Column(nullable: true)]
    private ?bool $resolut = false;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $astuce_resolution = null;

    #[ORM\OneToMany(mappedBy: 'incident', targetEntity: Alerte::class, orphanRemoval: true)]
    private Collection $alertes;

    #[ORM\OneToMany(mappedBy: 'Incident', targetEntity: Sujet::class, orphanRemoval: true)]
    private Collection $sujets;

    #[ORM\ManyToOne(inversedBy: 'incidents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?vulnerabilite $incident = null;

    public function __construct()
    {
        $this->alertes = new ArrayCollection();
        $this->sujets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNomIncident(): ?string
    {
        return $this->nomIncident;
    }

    public function setNomIncident(string $nomIncident): self
    {
        $this->nomIncident = $nomIncident;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function isResolut(): ?bool
    {
        return $this->resolut;
    }

    public function setResolut(?bool $resolut): self
    {
        $this->resolut = $resolut;

        return $this;
    }

    public function getAstuceResolution(): ?string
    {
        return $this->astuce_resolution;
    }

    public function setAstuceResolution(?string $astuce_resolution): self
    {
        $this->astuce_resolution = $astuce_resolution;

        return $this;
    }

    /**
     * @return Collection<int, Alerte>
     */
    public function getAlertes(): Collection
    {
        return $this->alertes;
    }

    public function addAlerte(Alerte $alerte): self
    {
        if (!$this->alertes->contains($alerte)) {
            $this->alertes->add($alerte);
            $alerte->setIncident($this);
        }

        return $this;
    }

    public function removeAlerte(Alerte $alerte): self
    {
        if ($this->alertes->removeElement($alerte)) {
            // set the owning side to null (unless already changed)
            if ($alerte->getIncident() === $this) {
                $alerte->setIncident(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Sujet>
     */
    public function getSujets(): Collection
    {
        return $this->sujets;
    }

    public function addSujet(Sujet $sujet): self
    {
        if (!$this->sujets->contains($sujet)) {
            $this->sujets->add($sujet);
            $sujet->setIncident($this);
        }

        return $this;
    }

    public function removeSujet(Sujet $sujet): self
    {
        if ($this->sujets->removeElement($sujet)) {
            // set the owning side to null (unless already changed)
            if ($sujet->getIncident() === $this) {
                $sujet->setIncident(null);
            }
        }

        return $this;
    }

    public function getIncident(): ?vulnerabilite
    {
        return $this->incident;
    }

    public function setIncident(?vulnerabilite $incident): self
    {
        $this->incident = $incident;

        return $this;
    }
}
