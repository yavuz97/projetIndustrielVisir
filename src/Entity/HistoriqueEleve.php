<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoriqueEleveRepository")
 */
class HistoriqueEleve
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
    private $nomEtablissement;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $classe;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $entreeIr;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $sortieIr;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $MotifSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Eleve", inversedBy="lesHistoriqueEleve")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $anneeScolaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtablissement(): ?string
    {
        return $this->nomEtablissement;
    }

    public function setNomEtablissement(?string $nomEtablissement): self
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(?string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getEntreeIr(): ?\DateTimeInterface
    {
        return $this->entreeIr;
    }

    public function setEntreeIr(\DateTimeInterface $entreeIr): self
    {
        $this->entreeIr = $entreeIr;

        return $this;
    }

    public function getSortieIr(): ?\DateTimeInterface
    {
        return $this->sortieIr;
    }

    public function setSortieIr(?\DateTimeInterface $sortieIr): self
    {
        $this->sortieIr = $sortieIr;

        return $this;
    }

    public function getMotifSortie(): ?string
    {
        return $this->MotifSortie;
    }

    public function setMotifSortie(?string $MotifSortie): self
    {
        $this->MotifSortie = $MotifSortie;

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

    public function getAnneeScolaire(): ?string
    {
        return $this->anneeScolaire;
    }

    public function setAnneeScolaire(?string $anneeScolaire): self
    {
        $this->anneeScolaire = $anneeScolaire;

        return $this;
    }
}
