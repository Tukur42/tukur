<?php

namespace App\Entity;

use App\Repository\IncidentsTraitesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncidentsTraitesRepository::class)]
class IncidentsTraites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $date_traitement = null;

    #[ORM\Column(length: 255)]
    private ?string $conseil = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTraitement(): ?string
    {
        return $this->date_traitement;
    }

    public function setDateTraitement(string $date_traitement): self
    {
        $this->date_traitement = $date_traitement;

        return $this;
    }

    public function getConseil(): ?string
    {
        return $this->conseil;
    }

    public function setConseil(string $conseil): self
    {
        $this->conseil = $conseil;

        return $this;
    }
}
