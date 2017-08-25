<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'ownerIsAlone',
            ChoiceType::class,
            [
                'choices' => [
                    'trav.alone' => 'ALONE',
                    'trav.couple' => 'COUPLE',
                    'trav.friends' => 'FRIENDS'
                ],
                'label' => 'trav_how_will_you_travel'
            ]
        )
            ->add(
                'themes',
                ThemeType::class,
                [
                    'label' => 'Themes'
                ]
                )
            ->add(
                'spokenLanguages',
                LangueType::class,
                [
                    'label' => 'trav.spoken.languages'
                ]
            )
            ->add(
                'typeDeVoyage',
                ChoiceType::class,
                [
                    'choices' => [
                        'trav.female' => 'FEMALE',
                        'trav.male' => 'MALE',
                        'trav.mixte' => 'MIXTE'
                    ],
                    'label' => 'trav.travelers.genre'
                ]

                )
            ->add(
                'strict_criteria',
                ChoiceType::class,
                [
                    'choices' => [
                        'trav.yes' => 1,
                        'trav.no' => 0,
                    ],
                    'placeholder' => false,
                    'label' => 'trav.show.to.perfect.match'
                ]
            )
            ->add(
                'budget',
                NumberType::class,
                [
                    'label' => 'trav.estimated.budget'
                ]
                )
            ->add(
                'currency',
                CurrencyType::class,
                [
                    'placeholder' => false
                ]
                )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults(
           [
               'data_class' => 'AppBundle\Entity\Voyage'
           ]
       );
    }

    public function getName()
    {
        return 'app_bundle_voyage_type';
    }
}
