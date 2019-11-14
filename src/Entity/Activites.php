<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivitesRepository")
 */
class Activites
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numActivite;

    /**
     * @ORM\Column(type="integer")
     */
    private $numSequence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $absent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $travailaFaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $travailEfectue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $travailaPrevoir;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumActivite(): ?int
    {
        return $this->numActivite;
    }

    public function setNumActivite(int $numActivite): self
    {
        $this->numActivite = $numActivite;

        return $this;
    }

    public function getNumSequence(): ?int
    {
        return $this->numSequence;
    }

    public function setNumSequence(int $numSequence): self
    {
        $this->numSequence = $numSequence;

        return $this;
    }

    public function getAbsent(): ?string
    {
        return $this->absent;
    }

    public function setAbsent(string $absent): self
    {
        $this->absent = $absent;

        return $this;
    }

    public function getTravailaFaire(): ?string
    {
        return $this->travailaFaire;
    }

    public function setTravailaFaire(string $travailaFaire): self
    {
        $this->travailaFaire = $travailaFaire;

        return $this;
    }

    public function getTravailEfectue(): ?string
    {
        return $this->travailEfectue;
    }

    public function setTravailEfectue(?string $travailEfectue): self
    {
        $this->travailEfectue = $travailEfectue;

        return $this;
    }

    public function getTravailaPrevoir(): ?string
    {
        return $this->travailaPrevoir;
    }

    public function setTravailaPrevoir(?string $travailaPrevoir): self
    {
        $this->travailaPrevoir = $travailaPrevoir;

        return $this;
    }
}
