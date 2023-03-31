<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $tittreEv = null;

    #[ORM\Column(length: 255)]
    private ?string $imageEve = null;

    #[ORM\Column(length: 255)]
    private ?string $sourceEv = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionEv = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEv = null;

    #[ORM\ManyToOne(inversedBy: 'evenements')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTittreEv(): ?string
    {
        return $this->tittreEv;
    }

    public function setTittreEv(string $tittreEv): self
    {
        $this->tittreEv = $tittreEv;

        return $this;
    }

    public function getImageEve(): ?string
    {
        return $this->imageEve;
    }

    public function setImageEve(string $imageEve): self
    {
        $this->imageEve = $imageEve;

        return $this;
    }

    public function getSourceEv(): ?string
    {
        return $this->sourceEv;
    }

    public function setSourceEv(string $sourceEv): self
    {
        $this->sourceEv = $sourceEv;

        return $this;
    }

    public function getDescriptionEv(): ?string
    {
        return $this->descriptionEv;
    }

    public function setDescriptionEv(string $descriptionEv): self
    {
        $this->descriptionEv = $descriptionEv;

        return $this;
    }

    public function getDateEv(): ?\DateTimeInterface
    {
        return $this->dateEv;
    }

    public function setDateEv(\DateTimeInterface $dateEv): self
    {
        $this->dateEv = $dateEv;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
