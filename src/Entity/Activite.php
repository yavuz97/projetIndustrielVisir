<?php

namespace App\Entity;

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
}
