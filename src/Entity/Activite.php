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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sequence", mappedBy="activite", orphanRemoval=true)
     */
    private $lesSequences;

    public function __construct()
    {
        $this->personnels = new ArrayCollection();
        $this->lesSequences = new ArrayCollection();
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

    /**
     * @return Collection|Sequence[]
     */
    public function getLesSequences(): Collection
    {
        return $this->lesSequences;
    }

    public function addLesSequence(Sequence $lesSequence): self
    {
        if (!$this->lesSequences->contains($lesSequence)) {
            $this->lesSequences[] = $lesSequence;
            $lesSequence->setActivite($this);
        }

        return $this;
    }

    public function removeLesSequence(Sequence $lesSequence): self
    {
        if ($this->lesSequences->contains($lesSequence)) {
            $this->lesSequences->removeElement($lesSequence);
            // set the owning side to null (unless already changed)
            if ($lesSequence->getActivite() === $this) {
                $lesSequence->setActivite(null);
            }
        }

        return $this;
    }
}
