<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 *  @ApiResource(
 *     * attributes={
 *          "pagination_items_per_page"=10,
 *      },
 * 
 *     collectionOperations={
 *          "post"={
 *              "method"="POST",
 *              "path"="/admin/user",
 *      "denormalization_context"={"groups"={"user_write",}}
 *              
 *          },
 *         "get"={
 *              "method"="GET",
 *              "path"="/admin/users",
 *              "normalization_context"={"groups"={"user_read",}}
 *          },
 * "get"={
 *              "method"="GET",
 *              "path"="/user/count",
 *              "normalization_context"={"groups"={"user_read",}}
 *          },
 * 
 *     },
 *     
 *     itemOperations={
 * 
 *          "get_user"={
 *              "method"="GET",
 *              "path"="/admin/users/{id}",
 *              },
 *          "assister_seance"={
 *              "method"="GET",
 *              "path"="/users/badge/{uuid}",
 *              "normalization_context"={"groups"={"user_read"}},             
 * },
 *          
 *         "get"={
 *              "normalization_context"={"groups"={"user_read","user_details_read"}},
 *              "path"="admin/users/{id}",
 *              "requirements"={"id"="\d+"},
 *              "defaults"={"id"=null}
 *          },
 *           
 *         "delete"={
 *              
 *              "security_message"="Vous n'avez pas ces privileges.",
 *              "path"="admin/users/{id}",
 *              "requirements"={"id"="\d+"},
 *          },
 *         "patch"={
 *               
 *              "path"="admin/users/{id}",
 *              "requirements"={"id"="\d+"},
 *          },
 *         "put"={
 *               "path"="admin/users/{id}",
 *              "requirements"={"id"="\d+"},
 *          },
 * 
 *          
 *     },
 * )
 */

 class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user_write"})
     */
    private $username;

    
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"user_write"})
     */
    private $password;

    /*
     * @ORM\Column(type="blob", nullable=true)
     */
    private $avatar;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user_write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_write"})
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_write"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user_write"})
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAuthorized;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    public function __construct()
    {
        $this->isAuthorized = true;
        $this->dateCreation = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        //$roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_'.$this->role->getLibelle();
        return ($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;    
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $Nom): self
    {
        $this->nom = $Nom;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getIsAuthorized(): ?bool
    {
        return $this->isAuthorized;
    }

    public function setIsAuthorized(bool $isAuthorized): self
    {
        $this->isAuthorized = $isAuthorized;
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
}
