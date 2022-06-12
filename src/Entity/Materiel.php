<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MaterielRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielRepository::class)
 */
#[ApiResource]
class Materiel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAchete;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isForSelling;

    /**
     * @ORM\Column(type="date")
     */
    private $dateVendu;

    /**
     * @ORM\Column(type="float")
     */
    private $prixAchat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixVendu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvailable;

    /**
     * @ORM\OneToOne(targetEntity=Categorie::class, inversedBy="materiel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAchete(): ?\DateTimeInterface
    {
        return $this->dateAchete;
    }

    public function setDateAchete(\DateTimeInterface $dateAchete): self
    {
        $this->dateAchete = $dateAchete;
        return $this;
    }

    public function getIsForSelling(): ?bool
    {
        return $this->isForSelling;
    }

    public function setIsForSelling(bool $isForSelling): self
    {
        $this->isForSelling = $isForSelling;

        return $this;
    }

    public function getDateVendu(): ?\DateTimeInterface
    {
        return $this->dateVendu;
    }

    public function setDateVendu(\DateTimeInterface $dateVendu): self
    {
        $this->dateVendu = $dateVendu;
        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(float $prixAchat): self
    {
        $this->prixAchat = $prixAchat;
        return $this;
    }

    public function getPrixVendu(): ?float
    {
        return $this->prixVendu;
    }

    public function setPrixVendu(?float $prixVendu): self
    {
        $this->prixVendu = $prixVendu;
        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;
        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
