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

class PersonnelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fonction')
            ->add('actionIR')
            ->add('organisme')
            ->add('responsable')
            ->add('tel')
            ->add('numCarteXpass')
            ->add('niveauEtude')
            ->add('hautDiplome')
            ->add('specialite')
            ->add('formationEnCours')
            ->add('droit200h')
            ->add('tp')
            ->add('dateEntree')
            ->add('dateSortie')
            ->add('user')
            ->add('user', EntityType::class,[
                'class' => User::class,
                'choice_label' => 'prenom'
            ])
            ->add('etablissement', EntityType::class,[
                'class' => Etablissement::class,
                'choice_label' => 'nomEtablissement'
            ])
            ->add('activite', EntityType::class,[
                'class' => Activite::class,
                'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personnel::class,
        ]);
    }
}
