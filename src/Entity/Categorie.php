<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
#[ApiResource]
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isArchived;

    /**
     * @ORM\OneToOne(targetEntity=Produit::class, mappedBy="categorie", cascade={"persist", "remove"})
     */
    private $produit;

    /**
     * @ORM\OneToOne(targetEntity=Materiel::class, mappedBy="categorie", cascade={"persist", "remove"})
     */
    private $materiel;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(bool $isArchived): self
    {
        $this->isArchived = $isArchived;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(Produit $produit): self
    {
        // set the owning side of the relation if necessary
        if ($produit->getCategorie() !== $this) {
            $produit->setCategorie($this);
        }

        $this->produit = $produit;

        return $this;
    }

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(Materiel $materiel): self
    {
        // set the owning side of the relation if necessary
        if ($materiel->getCategorie() !== $this) {
            $materiel->setCategorie($this);
        }

        $this->materiel = $materiel;

        return $this;
    }
}
