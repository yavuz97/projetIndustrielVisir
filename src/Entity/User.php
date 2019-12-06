<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * * *@UniqueEntity(
 * fields={"username"},
 * message="email que vous avez indiqué est déja utilisé"
 * )
 */
class User implements  UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min ="8", minMessage="votre mot de passe doir faire minimum 8 characters")
     */
    private $password;


    /**
     * @Assert\EqualTo(propertyPath="password", message="vous n'avait pas tapé le meme mot de passe")
     */
    public $confirm_password;


    /**
     * @var array
     *
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel", mappedBy="user", orphanRemoval=true)
     */
    private $lesPersonnels;

    public function __construct()
    {
        $this->lesPersonnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    public function  eraseCredentials()
    {

    }

    public function getSalt()
    {

    }
    public function getRoles()
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = '';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Personnel[]
     */
    public function getLesPersonnels(): Collection
    {
        return $this->lesPersonnels;
    }

    public function addLesPersonnel(Personnel $lesPersonnel): self
    {
        if (!$this->lesPersonnels->contains($lesPersonnel)) {
            $this->lesPersonnels[] = $lesPersonnel;
            $lesPersonnel->setUser($this);
        }

        return $this;
    }

    public function removeLesPersonnel(Personnel $lesPersonnel): self
    {
        if ($this->lesPersonnels->contains($lesPersonnel)) {
            $this->lesPersonnels->removeElement($lesPersonnel);
            // set the owning side to null (unless already changed)
            if ($lesPersonnel->getUser() === $this) {
                $lesPersonnel->setUser(null);
            }
        }

        return $this;
    }

}
