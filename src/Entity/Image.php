<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
#[ApiResource]
class Image
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
    private $nomImage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAchived;

    /**
     * @ORM\ManyToOne(targetEntity=Piscine::class, inversedBy="images")
     */
    private $piscine;

    

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\Column(type="blob")
     */
    private $file;

    public function __construct()
    {
        $this->isArchived = false;
        $this->dateCreation = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImage(): ?string
    {
        return $this->nomImage;
    }

    public function setNomImage(string $nomImage): self
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    public function getIsAchived(): ?bool
    {
        return $this->isAchived;
    }

    public function setIsAchived(bool $isAchived): self
    {
        $this->isAchived = $isAchived;

        return $this;
    }

    public function getPiscine(): ?Piscine
    {
        return $this->piscine;
    }

    public function setPiscine(?Piscine $piscine): self
    {
        $this->piscine = $piscine;

        return $this;
    }

   

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file): self
    {
        $this->file = $file;

        return $this;
    }
}
