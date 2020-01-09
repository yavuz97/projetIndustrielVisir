<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Etablissement;
use App\Entity\Personnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class EleveShowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('personnel', EntityType::class,[
                'class' => Personnel::class,

                'choice_label' => 'user.nom'
            ])
            ->add('etablissement', EntityType::class,[
                'class' => Etablissement::class,
                'choice_label' => 'nomEtablissement'
            ])
            ->add('anneeScolaire')
            ->add('nom')
            ->add('prenom')
            ->add('sexe')
            ->add('dateNaiss')
            ->add('etabOrigine')
            ->add('classOrigine')
            ->add('entreeIR')
            ->add('sortieIR')
            ->add('motifSortie')
            ->add('telPortable')
            ->add('email')
            ->add('chambre')
            ->add('telStandart')
            ->add('classActuelle')
            ->add('niveau')
            ->add('enseignement')
            ->add('specialite')
            ->add('telResEs')
            ->add('etage')
            ->add('suivieScolaire')
            ->add('particularite')
            ->add('RLprioritaire')
            ->add('respLegal1')
            ->add('lienR1')
            ->add('adresseR1')
            ->add('codePostR1')
            ->add('villeR1')
            ->add('telFixeR1')
            ->add('telPortR1')
            ->add('telTravailleR1')
            ->add('emailR1')
            ->add('respLegal2')
            ->add('lienRL2')
            ->add('adresseR2')
            ->add('codePostR2')
            ->add('villeR2')
            ->add('telFixeR2')
            ->add('telPortR2')
            ->add('telTravailleR2')
            ->add('emailR2')
            ->add('autreContact')
            ->add('lienAC')
            ->add('adresseAC')
            ->add('codePostAC')
            ->add('villeAC')
            ->add('telFixeAc')
            ->add('telPortAc')
            ->add('telTravailleAc')
            ->add('emailAc')
            ->add('educatifNom')
            ->add('educatifPrenom')
            ->add('educatifOrganisme')
            ->add('educatifTel')
            ->add('educatifEmail')
            ->add('PAI')
            ->add('medicament')
            ->add('santeNom')
            ->add('santePrenom')
            ->add('santeOrganisme')
            ->add('santeTelephone')
            ->add('santeEmail')
            ->add('socialeNom')
            ->add('socialePrenom')
            ->add('socialeOrganisme')
            ->add('socialeTel')
            ->add('socialeEmail')
            ->add('Xpass')
            ->add('categorieEco')
            ->add('QFFM')
            ->add('parsBses')
            ->add('PecPar')
            ->add('aideSupp')
            ->add('montant')
            ->add('ligneBus')
            ->add('departIR')
            ->add('notes')
            ->add('engagementInitial')
            ->add('charteVieCollective')
            ->add('ficheInfermerie')
            ->add('charteCDI')
            ->add('charteInfo')
            ->add('avisImposition')
            ->add('retourSeulDomicile')
            ->add('droitImage')
            ->add('presenceDimancheSoir')
            ->add('autonomieChambre')
            ->add('sortieEducative')
            ->add('dossierRentre')
            ->add('presenceVendrediSoir')
            ->add('presenceCouponImage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
