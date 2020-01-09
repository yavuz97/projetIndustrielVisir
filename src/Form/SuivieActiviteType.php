<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Sequence;
use App\Entity\SuivieActivite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class SuivieActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('absent')
            ->add('travailAfaire')
            ->add('travailEffectue')
            ->add('travailAprevoir')
            ->add('eleve', EntityType::class,[
                'class' => Eleve::class,

                'choice_label' => 'nom'
            ])
            ->add('sequence', EntityType::class,[
                'class' => Sequence::class,

                'choice_label' => 'id'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SuivieActivite::class,
        ]);
    }
}
