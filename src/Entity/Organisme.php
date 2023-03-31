<?php

namespace App\Entity;

use App\Repository\OrganismeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrganismeRepository::class)]
class Organisme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $codeOrg = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgOrg = null;

    #[ORM\Column(length: 100)]
    private ?string $siteOrg = null;

    #[ORM\Column(nullable: true)]
    private ?bool $etat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCodeOrg(): ?string
    {
        return $this->codeOrg;
    }

    public function setCodeOrg(?string $codeOrg): self
    {
        $this->codeOrg = $codeOrg;

        return $this;
    }

    public function getImgOrg(): ?string
    {
        return $this->imgOrg;
    }

    public function setImgOrg(?string $imgOrg): self
    {
        $this->imgOrg = $imgOrg;

        return $this;
    }

    public function getSiteOrg(): ?string
    {
        return $this->siteOrg;
    }

    public function setSiteOrg(string $siteOrg): self
    {
        $this->siteOrg = $siteOrg;

        return $this;
    }

    public function isEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(?bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
