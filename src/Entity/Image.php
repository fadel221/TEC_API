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
}
