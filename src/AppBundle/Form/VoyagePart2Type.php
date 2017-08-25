<?php

namespace AppBundle\Form;

use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyagePart2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'annonce',
                TextareaType::class,
                [
                    'label' => 'trav.voyage.description'
                ]
            )
            ->add(
                'smockerAllowed',
                ChoiceType::class,
                [
                    'choices' => [
                        'trav.yes' => 1,
                        'trav.no' => 0
                    ],
                    'label' => 'trav_smocker_allowed'
                ]
            )
            ->add(
                'genreVoyageurs',
                ChoiceType::class,
                [
                    'choices' => [
                        'trav.female' => 'FEMALE',
                        'trav.male' => 'MALE',
                        'trav.mixte' => 'MIXTE'
                    ],
                    'label' => 'trav.travelers.genre'
                ]

            );

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Voyage'
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_voyage_part2type';
    }
}
