<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchVoyageIndexType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address',TextType::class,
                [
                    'label'=>'trav.where.you.go',
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
