<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnelRepository")
 */
class Personnel
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
    private $fonction;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $actionIR;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $organisme;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $responsable;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $numCarteXpass;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $niveauEtude;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $hautDiplome;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $specialite;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $formationEnCours;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $droit200h;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tp;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEntree;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="lesPersonnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etablissement", inversedBy="lesPersonnels")
     */
    private $etablissement;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Activite", inversedBy="personnels")
     */
    private $lesActivites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VoiturePersonnel", mappedBy="personnel", orphanRemoval=true)
     */
    private $lesVoitures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sequence", mappedBy="personnel", orphanRemoval=true)
     */
    private $lesSequences;

    public function __construct()
    {
        $this->lesActivites = new ArrayCollection();
        $this->lesVoitures = new ArrayCollection();
        $this->lesSequences = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getActionIR(): ?string
    {
        return $this->actionIR;
    }

    public function setActionIR(?string $actionIR): self
    {
        $this->actionIR = $actionIR;

        return $this;
    }

    public function getOrganisme(): ?string
    {
        return $this->organisme;
    }

    public function setOrganisme(?string $organisme): self
    {
        $this->organisme = $organisme;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getNumCarteXpass(): ?string
    {
        return $this->numCarteXpass;
    }

    public function setNumCarteXpass(?string $numCarteXpass): self
    {
        $this->numCarteXpass = $numCarteXpass;

        return $this;
    }

    public function getNiveauEtude(): ?string
    {
        return $this->niveauEtude;
    }

    public function setNiveauEtude(?string $niveauEtude): self
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    public function getHautDiplome(): ?string
    {
        return $this->hautDiplome;
    }

    public function setHautDiplome(?string $hautDiplome): self
    {
        $this->hautDiplome = $hautDiplome;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(?string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getFormationEnCours(): ?string
    {
        return $this->formationEnCours;
    }

    public function setFormationEnCours(?string $formationEnCours): self
    {
        $this->formationEnCours = $formationEnCours;

        return $this;
    }

    public function getDroit200h(): ?string
    {
        return $this->droit200h;
    }

    public function setDroit200h(?string $droit200h): self
    {
        $this->droit200h = $droit200h;

        return $this;
    }

    public function getTp(): ?int
    {
        return $this->tp;
    }

    public function setTp(?int $tp): self
    {
        $this->tp = $tp;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(?\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getEtablissement(): ?Etablissement
    {
        return $this->etablissement;
    }

    public function setEtablissement(?Etablissement $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * @return Collection|Activite[]
     */
    public function getLesActivites(): Collection
    {
        return $this->lesActivites;
    }

    public function addLesActivite(Activite $lesActivite): self
    {
        if (!$this->lesActivites->contains($lesActivite)) {
            $this->lesActivites[] = $lesActivite;
        }

        return $this;
    }

    public function removeLesActivite(Activite $lesActivite): self
    {
        if ($this->lesActivites->contains($lesActivite)) {
            $this->lesActivites->removeElement($lesActivite);
        }

        return $this;
    }

    /**
     * @return Collection|VoiturePersonnel[]
     */
    public function getLesVoitures(): Collection
    {
        return $this->lesVoitures;
    }

    public function addLesVoiture(VoiturePersonnel $lesVoiture): self
    {
        if (!$this->lesVoitures->contains($lesVoiture)) {
            $this->lesVoitures[] = $lesVoiture;
            $lesVoiture->setPersonnel($this);
        }

        return $this;
    }

    public function removeLesVoiture(VoiturePersonnel $lesVoiture): self
    {
        if ($this->lesVoitures->contains($lesVoiture)) {
            $this->lesVoitures->removeElement($lesVoiture);
            // set the owning side to null (unless already changed)
            if ($lesVoiture->getPersonnel() === $this) {
                $lesVoiture->setPersonnel(null);
            }
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
            $lesSequence->setPersonnel($this);
        }

        return $this;
    }

    public function removeLesSequence(Sequence $lesSequence): self
    {
        if ($this->lesSequences->contains($lesSequence)) {
            $this->lesSequences->removeElement($lesSequence);
            // set the owning side to null (unless already changed)
            if ($lesSequence->getPersonnel() === $this) {
                $lesSequence->setPersonnel(null);
            }
        }

        return $this;
    }


}
