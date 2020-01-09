<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SequenceRepository")
 */
class Sequence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $salle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activite", inversedBy="lesSequences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $activite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel", inversedBy="lesSequences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $heureFin;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SuivieActivite", mappedBy="sequence", orphanRemoval=true)
     */
    private $lesSuivieActitivites;

    public function __construct()
    {
        $this->lesSuivieActitivites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(?string $salle): self
    {
        $this->salle = $salle;

        return $this;
    }



    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getPersonnel(): ?Personnel
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnel $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }


    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heureFin;
    }

    public function setHeureFin(\DateTimeInterface $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|SuivieActivite[]
     */
    public function getLesSuivieActitivites(): Collection
    {
        return $this->lesSuivieActitivites;
    }

    public function addLesSuivieActitivite(SuivieActivite $lesSuivieActitivite): self
    {
        if (!$this->lesSuivieActitivites->contains($lesSuivieActitivite)) {
            $this->lesSuivieActitivites[] = $lesSuivieActitivite;
            $lesSuivieActitivite->setSequence($this);
        }

        return $this;
    }

    public function removeLesSuivieActitivite(SuivieActivite $lesSuivieActitivite): self
    {
        if ($this->lesSuivieActitivites->contains($lesSuivieActitivite)) {
            $this->lesSuivieActitivites->removeElement($lesSuivieActitivite);
            // set the owning side to null (unless already changed)
            if ($lesSuivieActitivite->getSequence() === $this) {
                $lesSuivieActitivite->setSequence(null);
            }
        }

        return $this;
    }
}
