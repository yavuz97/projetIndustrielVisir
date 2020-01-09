<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SuivieActiviteRepository")
 */
class SuivieActivite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $absent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $travailAfaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $travailEffectue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $travailAprevoir;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Eleve", inversedBy="lesSuivieActivites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sequence", inversedBy="lesSuivieActitivites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sequence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbsent(): ?string
    {
        return $this->absent;
    }

    public function setAbsent(?string $absent): self
    {
        $this->absent = $absent;

        return $this;
    }

    public function getTravailAfaire(): ?string
    {
        return $this->travailAfaire;
    }

    public function setTravailAfaire(?string $travailAfaire): self
    {
        $this->travailAfaire = $travailAfaire;

        return $this;
    }

    public function getTravailEffectue(): ?string
    {
        return $this->travailEffectue;
    }

    public function setTravailEffectue(?string $travailEffectue): self
    {
        $this->travailEffectue = $travailEffectue;

        return $this;
    }

    public function getTravailAprevoir(): ?string
    {
        return $this->travailAprevoir;
    }

    public function setTravailAprevoir(?string $travailAprevoir): self
    {
        $this->travailAprevoir = $travailAprevoir;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): self
    {
        $this->eleve = $eleve;

        return $this;
    }

    public function getSequence(): ?Sequence
    {
        return $this->sequence;
    }

    public function setSequence(?Sequence $sequence): self
    {
        $this->sequence = $sequence;

        return $this;
    }
}
