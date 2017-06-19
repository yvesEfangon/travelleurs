<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'country',
            CountryType::class,
            [
                'label'=> 'trav.country'
            ]
        )
        ->add(
            'user',
            HiddenType::class,
            [
                'required'=>true
            ])
        ->add(
            'city',
            TextType::class,
            [
                'required'=>true,
                'label'=>'trav.city'
            ]
            )
        ->add(
            'street',
            TextType::class,
            [
                'required'=>true,
                'label'=>'trav.street'
            ]
        )
        ->add(
            'zipCode',
            TextType::class,
            [
                'required'=>true,
                'label'=>'trav.zipcode'
            ]
        )
        ->add(
            'altitude',
            HiddenType::class
        )
        ->add(
            'longitude',
            HiddenType::class
            )
        ->add(
            'submit',
            SubmitType::class
        )
        ;
    }


    public function getName()
    {
        return 'app_bundle_address_type';
    }
}
