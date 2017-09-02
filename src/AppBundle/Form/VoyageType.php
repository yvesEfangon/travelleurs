<?php

namespace AppBundle\Form;

use AppBundle\Entity\Voyage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageType extends AbstractType
{
    private $container;

    /**
     * VoyageType constructor.
     * @param $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


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
            ->add('themes', EntityType::class,
                [
                    'class'=>'AppBundle\Entity\Theme',
                    'choice_label' => 'libelle',
                    'expanded' => false,
                    'multiple' => true,
                    'required' => true,
                    'translation_domain' => 'messages',
                    'choice_translation_domain' => 'messages'
                ])
            ->add(
                'spokenLanguages',
                EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Langue',
                    'choice_label' => 'code',
                    'expanded' => false,
                    'multiple' => true,
                    'required' => true
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
               'data_class' => Voyage::class
           ]
       );
    }

    public function getName()
    {
        return 'app_bundle_voyage_type';
    }
}
