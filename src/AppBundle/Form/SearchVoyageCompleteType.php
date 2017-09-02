<?php

namespace AppBundle\Form;

use AppBundle\Entity\Voyage;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchVoyageCompleteType extends AbstractType
{
    private $container;

    /**
     * SearchVoyageCompleteType constructor.
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
            ->add('address',TextType::class,
                [
                    'attr'=>[
                        'class'=>'form-control input-lg js-address',
                        'placeholder'=>'trav.where.you.go'
                    ]
                ])
            ->add(
                'lat',
                HiddenType::class,
                [
                    'attr' => ['class' => 'js-gmaps-lat']
                ]
            )
            ->add(
                'lng',
                HiddenType::class,
                [
                    'attr' => ['class' => 'js-gmaps-lng']
                ]
            )
            ->add(
                'locality',
                HiddenType::class,
                [
                    'attr' => ['class' => 'js-gmaps-locality']
                ]
            )
            ->add(
                'administrative_area',
                HiddenType::class,
                [
                    'attr' => ['class' => 'js-gmaps-administrative_area']
                ]
            )
            ->add(
                'country',
                HiddenType::class,
                [
                    'attr' => ['class' => 'js-gmaps-country']
                ]
            )
            ->add(
                'placeId',
                HiddenType::class,
                [
                    'attr' => ['class' => 'js-gmaps-placeId']
                ]
            )
            ->add(
                'genreVoyageurs',
                ChoiceType::class,
                [
                    'choices' => $genres,
                    'placeholder' => 'trav.travelers.genre',
                    'expanded' => false,
                    'multiple' => false,
                    'required' => true,
                    'translation_domain' => 'messages',
                    'choice_translation_domain' => 'messages'
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
                    'placeholder' => 'trav_smocker_allowed',
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'app_bundle_search_voyage_type';
    }
}
