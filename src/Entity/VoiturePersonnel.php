<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoiturePersonnelRepository")
 */
class VoiturePersonnel
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
    private $marque;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $immarticulation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $badge;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel", inversedBy="lesVoitures")
     */
    private $personnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(?string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getImmarticulation(): ?string
    {
        return $this->immarticulation;
    }

    public function setImmarticulation(?string $immarticulation): self
    {
        $this->immarticulation = $immarticulation;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function setBadge(?string $badge): self
    {
        $this->badge = $badge;

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
}
