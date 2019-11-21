<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtablissementRepository")
 */
class Etablissement
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
    private $nomEtablissement;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codeRNE;

    /**
     * @ORM\Column(type="boolean")
     */
    private $secteurMetz;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $chefEtablissement;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adjoint;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $referentES;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telReferent;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telStandard;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telVieScolaire;








    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtablissement(): ?string
    {
        return $this->nomEtablissement;
    }

    public function setNomEtablissement(string $nomEtablissement): self
    {
        $this->nomEtablissement = $nomEtablissement;

        return $this;
    }

    public function getCodeRNE(): ?string
    {
        return $this->codeRNE;
    }

    public function setCodeRNE(?string $codeRNE): self
    {
        $this->codeRNE = $codeRNE;

        return $this;
    }

    public function getSecteurMetz(): ?bool
    {
        return $this->secteurMetz;
    }

    public function setSecteurMetz(bool $secteurMetz): self
    {
        $this->secteurMetz = $secteurMetz;

        return $this;
    }

    public function getChefEtablissement(): ?string
    {
        return $this->chefEtablissement;
    }

    public function setChefEtablissement(?string $chefEtablissement): self
    {
        $this->chefEtablissement = $chefEtablissement;

        return $this;
    }

    public function getAdjoint(): ?string
    {
        return $this->adjoint;
    }

    public function setAdjoint(?string $adjoint): self
    {
        $this->adjoint = $adjoint;

        return $this;
    }

    public function getReferentES(): ?string
    {
        return $this->referentES;
    }

    public function setReferentES(?string $referentES): self
    {
        $this->referentES = $referentES;

        return $this;
    }

    public function getTelReferent(): ?int
    {
        return $this->telReferent;
    }

    public function setTelReferent(?int $telReferent): self
    {
        $this->telReferent = $telReferent;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(?int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getTelStandard(): ?int
    {
        return $this->telStandard;
    }

    public function setTelStandard(?int $telStandard): self
    {
        $this->telStandard = $telStandard;

        return $this;
    }

    public function getTelVieScolaire(): ?int
    {
        return $this->telVieScolaire;
    }

    public function setTelVieScolaire(?int $telVieScolaire): self
    {
        $this->telVieScolaire = $telVieScolaire;

        return $this;
    }





}
