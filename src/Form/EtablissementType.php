<?php

namespace App\Form;

use App\Entity\Etablissement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Local;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEtablissement')
            ->add('codeRNE')
            ->add('secteurMetz')
            ->add('chefEtablissement')
            ->add('adjoint')
            ->add('referentES')
            ->add('telReferent')
            ->add('adresse')
            ->add('codePostal')
            ->add('telStandard')
            ->add('ville')
            ->add('telVieScolaire')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etablissement::class,
        ]);
    }
}
