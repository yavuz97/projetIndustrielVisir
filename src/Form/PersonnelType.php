<?php

namespace App\Form;

use App\Entity\Personnel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Activite;
use App\Entity\Etablissement;
use App\Entity\User;
use App\Entity\VoiturePersonnel;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PersonnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fonction', ChoiceType::class,
                array(
                    'choices' => array(
                        'AED' => 'AED',
                        'CPE' => 'CPE',
                        'Directeur' => 'Directeur',
                        'Animateur' => 'Animateur',
                        'Professeur' => 'Professeur',
                        'Infirmier' => 'Infirmier',
                        'Professeur doc.' => 'Professeur_doc.',
                        'ATEE' => 'ATEE',
                        'ATEE Chef' => 'ATEE_Chef',
                        'CRS' => 'CRS',
                        'Secrétaire' => 'Secrétaire',
                    )))

            ->add('actionIR', ChoiceType::class,
                array(
                    'choices' => array(
                        'oui' => 'oui',
                        'non' => 'non',
                    )))
            ->add('organisme', ChoiceType::class,
                array(
                    'choices' => array(
                        'Education nationale' => 'Education_nationale',
                        'Région lorraine' => 'Region_lorraine',
                        'Association' => 'Association',
                        'Club' => 'Club',
                        'Autonome' => 'Autonome',
                        'Famille résident' => 'Famille_resident',
                    )))
            ->add('responsable', ChoiceType::class,
                array(
                    'choices' => array(
                        'oui' => 'oui',
                        'non' => 'non',
                    )))
            ->add('tel')
            ->add('numCarteXpass')
            ->add('niveauEtude', ChoiceType::class,
                array(
                    'choices' => array(
                        'L3' => 'L3',
                        'L2' => 'L2',
                        'L1' => 'L1',
                        'BTS' => 'BTS',
                        'DUT' => 'DUT',
                        'M1' => 'M1',
                        'M2' => 'M2',
                        'DOC' => 'DOC',
                        'BT' => 'DOC',
                        'BP' => 'BP',
                        'BEP' => 'BEP',
                        'CAP' => 'CAP',
                    )))
            ->add('hautDiplome')
            ->add('specialite')
            ->add('formationEnCours')
            ->add('droit200h', ChoiceType::class,
                array(
                    'choices' => array(
                        'oui' => 'oui',
                        'non' => 'non',
                    )))
            ->add('tp')
            ->add('dateEntree')
            ->add('dateSortie')
            ->add('etablissement', EntityType::class,[
                'class' => Etablissement::class,
                'choice_label' => 'nomEtablissement'
            ])
         //   ->add('user')
        /*    ->add('user', EntityType::class,[
                'class' => User::class,
                'choice_label' => 'prenom'
            ])


             ->add('lesActivites', EntityType::class, array(
            'class' => Activite::class,
            'choice_label' => 'nom',
        ))
            ->add('lesVoitures', EntityType::class, array(
                'class' => VoiturePersonnel::class,
                'choice_label' => 'modele',

            ))
*/

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnel::class,
        ]);
    }
}
