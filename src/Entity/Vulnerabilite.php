<?php

namespace App\Entity;

use App\Repository\VulnerabiliteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VulnerabiliteRepository::class)]
class Vulnerabilite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $tittre = null;

    #[ORM\Column(length: 255)]
    private ?string $sourceVulnerabilite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $urlVulnerabilite = null;

    #[ORM\ManyToOne(inversedBy: 'vulnerabilites')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $utilisateur = null;

    #[ORM\OneToMany(mappedBy: 'incident', targetEntity: Incident::class, orphanRemoval: true)]
    private Collection $incidents;

    public function __construct()
    {
        $this->incidents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTittre(): ?string
    {
        return $this->tittre;
    }

    public function setTittre(string $tittre): self
    {
        $this->tittre = $tittre;

        return $this;
    }

    public function getSourceVulnerabilite(): ?string
    {
        return $this->sourceVulnerabilite;
    }

    public function setSourceVulnerabilite(string $sourceVulnerabilite): self
    {
        $this->sourceVulnerabilite = $sourceVulnerabilite;

        return $this;
    }

    public function getUrlVulnerabilite(): ?string
    {
        return $this->urlVulnerabilite;
    }

    public function setUrlVulnerabilite(?string $urlVulnerabilite): self
    {
        $this->urlVulnerabilite = $urlVulnerabilite;

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

    /**
     * @return Collection<int, Incident>
     */
    public function getIncidents(): Collection
    {
        return $this->incidents;
    }

    public function addIncident(Incident $incident): self
    {
        if (!$this->incidents->contains($incident)) {
            $this->incidents->add($incident);
            $incident->setIncident($this);
        }

        return $this;
    }

    public function removeIncident(Incident $incident): self
    {
        if ($this->incidents->removeElement($incident)) {
            // set the owning side to null (unless already changed)
            if ($incident->getIncident() === $this) {
                $incident->setIncident(null);
            }
        }

        return $this;
    }
}
