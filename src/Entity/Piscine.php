<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PiscineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PiscineRepository::class)
 */
#[ApiResource]
class Piscine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $surface;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBuilt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getIsBuilt(): ?bool
    {
        return $this->isBuilt;
    }

    public function setIsBuilt(bool $isBuilt): self
    {
        $this->isBuilt = $isBuilt;

        return $this;
    }
}
