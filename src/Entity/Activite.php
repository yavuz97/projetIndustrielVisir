<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActiviteRepository")
 */
class Activite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codeStatistique;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codeRegroupement;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnel", mappedBy="lesActivites")
     */
    private $personnels;

    public function __construct()
    {
        $this->personnels = new ArrayCollection();
    }

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

    public function getCodeStatistique(): ?string
    {
        return $this->codeStatistique;
    }

    public function setCodeStatistique(?string $codeStatistique): self
    {
        $this->codeStatistique = $codeStatistique;

        return $this;
    }

    public function getCodeRegroupement(): ?string
    {
        return $this->codeRegroupement;
    }

    public function setCodeRegroupement(?string $codeRegroupement): self
    {
        $this->codeRegroupement = $codeRegroupement;

        return $this;
    }

    /**
     * @return Collection|Personnel[]
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnel $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels[] = $personnel;
            $personnel->addLesActivite($this);
        }

        return $this;
    }

    public function removePersonnel(Personnel $personnel): self
    {
        if ($this->personnels->contains($personnel)) {
            $this->personnels->removeElement($personnel);
            $personnel->removeLesActivite($this);
        }

        return $this;
    }
}
