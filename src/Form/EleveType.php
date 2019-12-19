<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sexe', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'H' => 'H',
                        'F' => 'F'
                    )))
            ->add('dateNaiss')
            ->add('etabOrigine')
            ->add('classOrigine')
            ->add('entreeIR')
            ->add('sortieIR')
            ->add('motifSortie', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'Déménagement' => 'demenagement',
                        'Démission' => 'demission',
                        'EDT ES' => 'edtES',
                        'Financement' => 'financement',
                        'Exclusion ES' => 'exclusion_ES',
                        'Exclusion IR' => 'exclusion_IR',
                        'Logement week-end' => 'logementWE',
                        'Réorientation' => 'reorientation',
                        'Autre' => 'autre'
                    )))
            ->add('telPortable')
            ->add('email')
            ->add('chambre')
            ->add('telStandart')
            ->add('classActuelle')
            ->add('niveau')
            ->add('enseignement', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'PRO' => 'pro',
                        'GEN' => 'gen',
                        'TECH' => 'tech'
                    )))
            ->add('specialite')
            ->add('telResEs')
            ->add('etage')
            ->add('suivieScolaire')
            ->add('particularite')
            ->add('RLprioritaire')
            ->add('lienR1', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'Père' => 'pere',
                        'Mère' => 'mere',
                        'Beau père' => 'beauPere',
                        'Belle-mère' => 'belleMere',
                        'Educateur' => 'educateur',
                        'Tuteur' => 'tuteur',
                        'Autre parent' => 'autreParent',
                        'Famille d\'acceuil' => 'familleAcceuil',
                        'Grand-mère' => 'grandMere',
                        'Autre' => 'autre'
                    )))
            ->add('adresseR1')
            ->add('codePostR1')
            ->add('villeR1')
            ->add('telFixeR1')
            ->add('telPortR1')
            ->add('telTravailleR1')
            ->add('emailR1')
            ->add('respLegal2')
            ->add('lienRL2', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'Père' => 'pere',
                        'Mère' => 'mere',
                        'Beau père' => 'beauPere',
                        'Belle-mère' => 'belleMere',
                        'Educateur' => 'educateur',
                        'Tuteur' => 'tuteur',
                        'Autre parent' => 'autreParent',
                        'Famille d\'acceuil' => 'familleAcceuil',
                        'Grand-mère' => 'grandMere',
                        'Autre' => 'autre'
                    )))
            ->add('adresseR2')
            ->add('codePostR2')
            ->add('villeR2')
            ->add('telFixeR2')
            ->add('telPortR2')
            ->add('telTravailleR2')
            ->add('emailR2')
            ->add('autreContact')
            ->add('lienAC', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'Frère' => 'frere',
                        'Soeur' => 'soeur',
                        'Beau père' => 'beauPere',
                        'Belle-mère' => 'belleMere',
                        'Educateur' => 'educateur',
                        'Tuteur' => 'tuteur',
                        'Autre parent' => 'autreParent',
                        'Voisin' => 'voisin',
                        'Autre' => 'autre'
                    )))
            ->add('adresseAC')
            ->add('codePostAC')
            ->add('villeAC')
            ->add('telFixeAc')
            ->add('telPortAc')
            ->add('telTravailleAc')
            ->add('emailAc')
            ->add('educatifNom')
            ->add('educatifPrenom')
            ->add('educatifOrganisme', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'ASE' => 'ASE',
                        'PJJ' => 'PJJ',
                        'SEMO' => 'SEMO'
                    )))
            ->add('educatifTel')
            ->add('educatifEmail')
            ->add('PAI', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'Oui' => 'oui',
                        'Non' => 'non'
                    )))
            ->add('medicament', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'Oui' => 'oui',
                        'Non' => 'non'
                    )))
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
            ->add('categorieEco', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'
                    )))
            ->add('QFFM')
            ->add('parsBses')
            ->add('PecPar')
            ->add('aideSupp', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'FSL' => 'FSL',
                        'CAF' => 'CAF',
                        'FR' => 'FR',
                        'CCAS' => 'CCAS'
                    )))
            ->add('montant')
            ->add('ligneBus')
            ->add('departIR')
            ->add('notes')
            ->add('engagementInitial', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))

            ->add('charteVieCollective', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('ficheInfermerie', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('charteCDI', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('charteInfo', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('avisImposition', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('retourSeulDomicile', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('droitImage', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non',
                    )))
            ->add('presenceDimancheSoir', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('autonomieChambre', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('sortieEducative', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('dossierRentre', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('presenceVendrediSoir', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
            ->add('presenceCouponImage', ChoiceType::class,
                array(
                    'choices' => array(
                        'N/A' => 'N/A',
                        'oui' => 'oui',
                        'non' => 'non'
                    )))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
