<?php

namespace App\Entity;

use App\Repository\AlerteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlerteRepository::class)]
class Alerte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nomAlerte = null;

    #[ORM\Column(length: 100)]
    private ?string $systemAffecte = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePublication = null;

    #[ORM\Column(length: 100)]
    private ?string $ficheAlerte = null;

    #[ORM\ManyToOne(inversedBy: 'alerte')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'alertes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Incident $incident = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAlerte(): ?string
    {
        return $this->nomAlerte;
    }

    public function setNomAlerte(string $nomAlerte): self
    {
        $this->nomAlerte = $nomAlerte;

        return $this;
    }

    public function getSystemAffecte(): ?string
    {
        return $this->systemAffecte;
    }

    public function setSystemAffecte(string $systemAffecte): self
    {
        $this->systemAffecte = $systemAffecte;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(?\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getFicheAlerte(): ?string
    {
        return $this->ficheAlerte;
    }

    public function setFicheAlerte(string $ficheAlerte): self
    {
        $this->ficheAlerte = $ficheAlerte;

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

    public function getIncident(): ?Incident
    {
        return $this->incident;
    }

    public function setIncident(?Incident $incident): self
    {
        $this->incident = $incident;

        return $this;
    }
}
