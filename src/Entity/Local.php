<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocalRepository")
 */
class Local
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
    private $libelle;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capacite;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $utilisation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $specialisee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $observations;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(?int $capacite): self
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getUtilisation(): ?string
    {
        return $this->utilisation;
    }

    public function setUtilisation(?string $utilisation): self
    {
        $this->utilisation = $utilisation;

        return $this;
    }

    public function getSpecialisee(): ?bool
    {
        return $this->specialisee;
    }

    public function setSpecialisee(?bool $specialisee): self
    {
        $this->specialisee = $specialisee;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }



}
