<?php

namespace App\Entity;

use App\Repository\SujetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SujetRepository::class)]
class Sujet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column(length: 100)]
    private ?string $severite = null;

    #[ORM\ManyToOne(inversedBy: 'sujets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Incident $Incident = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getSeverite(): ?string
    {
        return $this->severite;
    }

    public function setSeverite(string $severite): self
    {
        $this->severite = $severite;

        return $this;
    }

    public function getIncident(): ?Incident
    {
        return $this->Incident;
    }

    public function setIncident(?Incident $Incident): self
    {
        $this->Incident = $Incident;

        return $this;
    }
}
