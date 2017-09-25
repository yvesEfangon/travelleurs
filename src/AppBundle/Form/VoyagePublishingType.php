<?php

namespace AppBundle\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyagePublishingType extends AbstractType
{
    private $container;

    /**
     * VoyagePart2Type constructor.
     * @param $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $genres = $this->container->get('trav.form.methods')->getGenres();
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
                    'choices' => $genres,
                    'placeholder' => 'trav.please.select',
                    'expanded' => false,
                    'multiple' => false,
                    'required' => true,
                    'translation_domain' => 'messages',
                    'choice_translation_domain' => 'messages'
                ]
            )
            ->add(
                'ageMax',
                NumberType::class,
                [
                    'attr' => ['readonly' => true]
                ]

            )
            ->add(
                'ageMin',
                NumberType::class,
                [
                    'attr' => ['readonly' => true]
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

    public function getBlockPrefix()
    {
        return 'app_bundle_voyage_part2type';
    }
}
