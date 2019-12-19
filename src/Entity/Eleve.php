<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EleveRepository")
 */
class Eleve
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaiss;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $etabOrigine;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $classOrigine;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $entreeIR;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $sortieIR;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $motifSortie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telPortable;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $chambre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telStandart;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $classActuelle;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $enseignement;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $specialite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telResEs;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $etage;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $suivieScolaire;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $particularite;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $RLprioritaire;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lienR1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adresseR1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codePostR1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $villeR1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telFixeR1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telPortR1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telTravailleR1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $emailR1;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $respLegal2;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lienRL2;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adresseR2;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codePostR2;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $villeR2;

    /**
     * @ORM\Column(type="integer",  nullable=true)
     */
    private $telFixeR2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telPortR2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telTravailleR2;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $emailR2;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $autreContact;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $lienAC;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adresseAC;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codePostAC;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $villeAC;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telFixeAc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telPortAc;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telTravailleAc;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $emailAc;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $educatifNom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $educatifPrenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $educatifOrganisme;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $educatifTel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $educatifEmail;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $PAI;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $medicament;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $santeNom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $santePrenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $santeOrganisme;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $santeTelephone;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $santeEmail;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $socialeNom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $socialePrenom;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $socialeOrganisme;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $socialeTel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $socialeEmail;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Xpass;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $categorieEco;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $QFFM;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $parsBses;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $PecPar;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $aideSupp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ligneBus;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $departIR;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $engagementInitial;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $charteVieCollective;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $ficheInfermerie;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $charteCDI;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $charteInfo;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $avisImposition;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $retourSeulDomicile;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $droitImage;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $presenceDimancheSoir;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $autonomieChambre;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $sortieEducative;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $dossierRentre;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $presenceVendrediSoir;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $presenceCouponImage;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(?string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(?\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getEtabOrigine(): ?string
    {
        return $this->etabOrigine;
    }

    public function setEtabOrigine(?string $etabOrigine): self
    {
        $this->etabOrigine = $etabOrigine;

        return $this;
    }

    public function getClassOrigine(): ?string
    {
        return $this->classOrigine;
    }

    public function setClassOrigine(?string $classOrigine): self
    {
        $this->classOrigine = $classOrigine;

        return $this;
    }

    public function getEntreeIR(): ?\DateTimeInterface
    {
        return $this->entreeIR;
    }

    public function setEntreeIR(?\DateTimeInterface $entreeIR): self
    {
        $this->entreeIR = $entreeIR;

        return $this;
    }

    public function getSortieIR(): ?\DateTimeInterface
    {
        return $this->sortieIR;
    }

    public function setSortieIR(?\DateTimeInterface $sortieIR): self
    {
        $this->sortieIR = $sortieIR;

        return $this;
    }

    public function getMotifSortie(): ?string
    {
        return $this->motifSortie;
    }

    public function setMotifSortie(?string $motifSortie): self
    {
        $this->motifSortie = $motifSortie;

        return $this;
    }

    public function getTelPortable(): ?int
    {
        return $this->telPortable;
    }

    public function setTelPortable(?int $telPortable): self
    {
        $this->telPortable = $telPortable;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getChambre(): ?string
    {
        return $this->chambre;
    }

    public function setChambre(?string $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getTelStandart(): ?int
    {
        return $this->telStandart;
    }

    public function setTelStandart(?int $telStandart): self
    {
        $this->telStandart = $telStandart;

        return $this;
    }

    public function getClassActuelle(): ?string
    {
        return $this->classActuelle;
    }

    public function setClassActuelle(?string $classActuelle): self
    {
        $this->classActuelle = $classActuelle;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getEnseignement(): ?string
    {
        return $this->enseignement;
    }

    public function setEnseignement(?string $enseignement): self
    {
        $this->enseignement = $enseignement;

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

    public function getTelResEs(): ?int
    {
        return $this->telResEs;
    }

    public function setTelResEs(?int $telResEs): self
    {
        $this->telResEs = $telResEs;

        return $this;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(?string $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getSuivieScolaire(): ?string
    {
        return $this->suivieScolaire;
    }

    public function setSuivieScolaire(?string $suivieScolaire): self
    {
        $this->suivieScolaire = $suivieScolaire;

        return $this;
    }

    public function getParticularite(): ?string
    {
        return $this->particularite;
    }

    public function setParticularite(?string $particularite): self
    {
        $this->particularite = $particularite;

        return $this;
    }

    public function getRLprioritaire(): ?string
    {
        return $this->RLprioritaire;
    }

    public function setRLprioritaire(string $RLprioritaire): self
    {
        $this->RLprioritaire = $RLprioritaire;

        return $this;
    }

    public function getLienR1(): ?string
    {
        return $this->lienR1;
    }

    public function setLienR1(?string $lienR1): self
    {
        $this->lienR1 = $lienR1;

        return $this;
    }

    public function getAdresseR1(): ?string
    {
        return $this->adresseR1;
    }

    public function setAdresseR1(?string $adresseR1): self
    {
        $this->adresseR1 = $adresseR1;

        return $this;
    }

    public function getCodePostR1(): ?string
    {
        return $this->codePostR1;
    }

    public function setCodePostR1(?string $codePostR1): self
    {
        $this->codePostR1 = $codePostR1;

        return $this;
    }

    public function getVilleR1(): ?string
    {
        return $this->villeR1;
    }

    public function setVilleR1(?string $villeR1): self
    {
        $this->villeR1 = $villeR1;

        return $this;
    }

    public function getTelFixeR1(): ?int
    {
        return $this->telFixeR1;
    }

    public function setTelFixeR1(?int $telFixeR1): self
    {
        $this->telFixeR1 = $telFixeR1;

        return $this;
    }

    public function getTelPortR1(): ?int
    {
        return $this->telPortR1;
    }

    public function setTelPortR1(?int $telPortR1): self
    {
        $this->telPortR1 = $telPortR1;

        return $this;
    }

    public function getTelTravailleR1(): ?int
    {
        return $this->telTravailleR1;
    }

    public function setTelTravailleR1(?int $telTravailleR1): self
    {
        $this->telTravailleR1 = $telTravailleR1;

        return $this;
    }

    public function getEmailR1(): ?string
    {
        return $this->emailR1;
    }

    public function setEmailR1(?string $emailR1): self
    {
        $this->emailR1 = $emailR1;

        return $this;
    }

    public function getRespLegal2(): ?string
    {
        return $this->respLegal2;
    }

    public function setRespLegal2(?string $respLegal2): self
    {
        $this->respLegal2 = $respLegal2;

        return $this;
    }

    public function getLienRL2(): ?string
    {
        return $this->lienRL2;
    }

    public function setLienRL2(?string $lienRL2): self
    {
        $this->lienRL2 = $lienRL2;

        return $this;
    }

    public function getAdresseR2(): ?string
    {
        return $this->adresseR2;
    }

    public function setAdresseR2(?string $adresseR2): self
    {
        $this->adresseR2 = $adresseR2;

        return $this;
    }

    public function getCodePostR2(): ?string
    {
        return $this->codePostR2;
    }

    public function setCodePostR2(?string $codePostR2): self
    {
        $this->codePostR2 = $codePostR2;

        return $this;
    }

    public function getVilleR2(): ?string
    {
        return $this->villeR2;
    }

    public function setVilleR2(?string $villeR2): self
    {
        $this->villeR2 = $villeR2;

        return $this;
    }

    public function getTelFixeR2(): ?int
    {
        return $this->telFixeR2;
    }

    public function setTelFixeR2(int $telFixeR2): self
    {
        $this->telFixeR2 = $telFixeR2;

        return $this;
    }

    public function getTelPortR2(): ?int
    {
        return $this->telPortR2;
    }

    public function setTelPortR2(?int $telPortR2): self
    {
        $this->telPortR2 = $telPortR2;

        return $this;
    }

    public function getTelTravailleR2(): ?int
    {
        return $this->telTravailleR2;
    }

    public function setTelTravailleR2(?int $telTravailleR2): self
    {
        $this->telTravailleR2 = $telTravailleR2;

        return $this;
    }

    public function getEmailR2(): ?string
    {
        return $this->emailR2;
    }

    public function setEmailR2(?string $emailR2): self
    {
        $this->emailR2 = $emailR2;

        return $this;
    }

    public function getAutreContact(): ?string
    {
        return $this->autreContact;
    }

    public function setAutreContact(?string $autreContact): self
    {
        $this->autreContact = $autreContact;

        return $this;
    }

    public function getLienAC(): ?string
    {
        return $this->lienAC;
    }

    public function setLienAC(?string $lienAC): self
    {
        $this->lienAC = $lienAC;

        return $this;
    }

    public function getAdresseAC(): ?string
    {
        return $this->adresseAC;
    }

    public function setAdresseAC(?string $adresseAC): self
    {
        $this->adresseAC = $adresseAC;

        return $this;
    }

    public function getCodePostAC(): ?string
    {
        return $this->codePostAC;
    }

    public function setCodePostAC(?string $codePostAC): self
    {
        $this->codePostAC = $codePostAC;

        return $this;
    }

    public function getVilleAC(): ?string
    {
        return $this->villeAC;
    }

    public function setVilleAC(?string $villeAC): self
    {
        $this->villeAC = $villeAC;

        return $this;
    }

    public function getTelFixeAc(): ?int
    {
        return $this->telFixeAc;
    }

    public function setTelFixeAc(?int $telFixeAc): self
    {
        $this->telFixeAc = $telFixeAc;

        return $this;
    }

    public function getTelPortAc(): ?int
    {
        return $this->telPortAc;
    }

    public function setTelPortAc(?int $telPortAc): self
    {
        $this->telPortAc = $telPortAc;

        return $this;
    }

    public function getTelTravailleAc(): ?int
    {
        return $this->telTravailleAc;
    }

    public function setTelTravailleAc(?int $telTravailleAc): self
    {
        $this->telTravailleAc = $telTravailleAc;

        return $this;
    }

    public function getEmailAc(): ?string
    {
        return $this->emailAc;
    }

    public function setEmailAc(?string $emailAc): self
    {
        $this->emailAc = $emailAc;

        return $this;
    }

    public function getEducatifNom(): ?string
    {
        return $this->educatifNom;
    }

    public function setEducatifNom(?string $educatifNom): self
    {
        $this->educatifNom = $educatifNom;

        return $this;
    }

    public function getEducatifPrenom(): ?string
    {
        return $this->educatifPrenom;
    }

    public function setEducatifPrenom(?string $educatifPrenom): self
    {
        $this->educatifPrenom = $educatifPrenom;

        return $this;
    }

    public function getEducatifOrganisme(): ?string
    {
        return $this->educatifOrganisme;
    }

    public function setEducatifOrganisme(?string $educatifOrganisme): self
    {
        $this->educatifOrganisme = $educatifOrganisme;

        return $this;
    }

    public function getEducatifTel(): ?int
    {
        return $this->educatifTel;
    }

    public function setEducatifTel(?int $educatifTel): self
    {
        $this->educatifTel = $educatifTel;

        return $this;
    }

    public function getEducatifEmail(): ?string
    {
        return $this->educatifEmail;
    }

    public function setEducatifEmail(?string $educatifEmail): self
    {
        $this->educatifEmail = $educatifEmail;

        return $this;
    }

    public function getPAI(): ?string
    {
        return $this->PAI;
    }

    public function setPAI(?string $PAI): self
    {
        $this->PAI = $PAI;

        return $this;
    }

    public function getMedicament(): ?string
    {
        return $this->medicament;
    }

    public function setMedicament(?string $medicament): self
    {
        $this->medicament = $medicament;

        return $this;
    }

    public function getSanteNom(): ?string
    {
        return $this->santeNom;
    }

    public function setSanteNom(?string $santeNom): self
    {
        $this->santeNom = $santeNom;

        return $this;
    }

    public function getSantePrenom(): ?string
    {
        return $this->santePrenom;
    }

    public function setSantePrenom(?string $santePrenom): self
    {
        $this->santePrenom = $santePrenom;

        return $this;
    }

    public function getSanteOrganisme(): ?string
    {
        return $this->santeOrganisme;
    }

    public function setSanteOrganisme(?string $santeOrganisme): self
    {
        $this->santeOrganisme = $santeOrganisme;

        return $this;
    }

    public function getSanteTelephone(): ?int
    {
        return $this->santeTelephone;
    }

    public function setSanteTelephone(?int $santeTelephone): self
    {
        $this->santeTelephone = $santeTelephone;

        return $this;
    }

    public function getSanteEmail(): ?string
    {
        return $this->santeEmail;
    }

    public function setSanteEmail(?string $santeEmail): self
    {
        $this->santeEmail = $santeEmail;

        return $this;
    }

    public function getSocialeNom(): ?string
    {
        return $this->socialeNom;
    }

    public function setSocialeNom(?string $socialeNom): self
    {
        $this->socialeNom = $socialeNom;

        return $this;
    }

    public function getSocialePrenom(): ?string
    {
        return $this->socialePrenom;
    }

    public function setSocialePrenom(?string $socialePrenom): self
    {
        $this->socialePrenom = $socialePrenom;

        return $this;
    }

    public function getSocialeOrganisme(): ?string
    {
        return $this->socialeOrganisme;
    }

    public function setSocialeOrganisme(?string $socialeOrganisme): self
    {
        $this->socialeOrganisme = $socialeOrganisme;

        return $this;
    }

    public function getSocialeTel(): ?int
    {
        return $this->socialeTel;
    }

    public function setSocialeTel(?int $socialeTel): self
    {
        $this->socialeTel = $socialeTel;

        return $this;
    }

    public function getSocialeEmail(): ?string
    {
        return $this->socialeEmail;
    }

    public function setSocialeEmail(?string $socialeEmail): self
    {
        $this->socialeEmail = $socialeEmail;

        return $this;
    }

    public function getXpass(): ?string
    {
        return $this->Xpass;
    }

    public function setXpass(?string $Xpass): self
    {
        $this->Xpass = $Xpass;

        return $this;
    }

    public function getCategorieEco(): ?string
    {
        return $this->categorieEco;
    }

    public function setCategorieEco(?string $categorieEco): self
    {
        $this->categorieEco = $categorieEco;

        return $this;
    }

    public function getQFFM(): ?string
    {
        return $this->QFFM;
    }

    public function setQFFM(?string $QFFM): self
    {
        $this->QFFM = $QFFM;

        return $this;
    }

    public function getParsBses(): ?string
    {
        return $this->parsBses;
    }

    public function setParsBses(?string $parsBses): self
    {
        $this->parsBses = $parsBses;

        return $this;
    }

    public function getPecPar(): ?string
    {
        return $this->PecPar;
    }

    public function setPecPar(?string $PecPar): self
    {
        $this->PecPar = $PecPar;

        return $this;
    }

    public function getAideSupp(): ?string
    {
        return $this->aideSupp;
    }

    public function setAideSupp(?string $aideSupp): self
    {
        $this->aideSupp = $aideSupp;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(?int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getLigneBus(): ?string
    {
        return $this->ligneBus;
    }

    public function setLigneBus(?string $ligneBus): self
    {
        $this->ligneBus = $ligneBus;

        return $this;
    }

    public function getDepartIR(): ?\DateTimeInterface
    {
        return $this->departIR;
    }

    public function setDepartIR(?\DateTimeInterface $departIR): self
    {
        $this->departIR = $departIR;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getEngagementInitial(): ?string
    {
        return $this->engagementInitial;
    }

    public function setEngagementInitial(?string $engagementInitial): self
    {
        $this->engagementInitial = $engagementInitial;

        return $this;
    }

    public function getCharteVieCollective(): ?string
    {
        return $this->charteVieCollective;
    }

    public function setCharteVieCollective(?string $charteVieCollective): self
    {
        $this->charteVieCollective = $charteVieCollective;

        return $this;
    }

    public function getFicheInfermerie(): ?string
    {
        return $this->ficheInfermerie;
    }

    public function setFicheInfermerie(?string $ficheInfermerie): self
    {
        $this->ficheInfermerie = $ficheInfermerie;

        return $this;
    }

    public function getCharteCDI(): ?string
    {
        return $this->charteCDI;
    }

    public function setCharteCDI(?string $charteCDI): self
    {
        $this->charteCDI = $charteCDI;

        return $this;
    }

    public function getCharteInfo(): ?string
    {
        return $this->charteInfo;
    }

    public function setCharteInfo(?string $charteInfo): self
    {
        $this->charteInfo = $charteInfo;

        return $this;
    }

    public function getAvisImposition(): ?string
    {
        return $this->avisImposition;
    }

    public function setAvisImposition(?string $avisImposition): self
    {
        $this->avisImposition = $avisImposition;

        return $this;
    }

    public function getRetourSeulDomicile(): ?string
    {
        return $this->retourSeulDomicile;
    }

    public function setRetourSeulDomicile(?string $retourSeulDomicile): self
    {
        $this->retourSeulDomicile = $retourSeulDomicile;

        return $this;
    }

    public function getDroitImage(): ?string
    {
        return $this->droitImage;
    }

    public function setDroitImage(?string $droitImage): self
    {
        $this->droitImage = $droitImage;

        return $this;
    }

    public function getPresenceDimancheSoir(): ?string
    {
        return $this->presenceDimancheSoir;
    }

    public function setPresenceDimancheSoir(?string $presenceDimancheSoir): self
    {
        $this->presenceDimancheSoir = $presenceDimancheSoir;

        return $this;
    }

    public function getAutonomieChambre(): ?string
    {
        return $this->autonomieChambre;
    }

    public function setAutonomieChambre(?string $autonomieChambre): self
    {
        $this->autonomieChambre = $autonomieChambre;

        return $this;
    }

    public function getSortieEducative(): ?string
    {
        return $this->sortieEducative;
    }

    public function setSortieEducative(?string $sortieEducative): self
    {
        $this->sortieEducative = $sortieEducative;

        return $this;
    }

    public function getDossierRentre(): ?string
    {
        return $this->dossierRentre;
    }

    public function setDossierRentre(?string $dossierRentre): self
    {
        $this->dossierRentre = $dossierRentre;

        return $this;
    }

    public function getPresenceVendrediSoir(): ?string
    {
        return $this->presenceVendrediSoir;
    }

    public function setPresenceVendrediSoir(?string $presenceVendrediSoir): self
    {
        $this->presenceVendrediSoir = $presenceVendrediSoir;

        return $this;
    }

    public function getPresenceCouponImage(): ?string
    {
        return $this->presenceCouponImage;
    }

    public function setPresenceCouponImage(?string $presenceCouponImage): self
    {
        $this->presenceCouponImage = $presenceCouponImage;

        return $this;
    }
}
