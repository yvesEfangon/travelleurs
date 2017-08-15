<?php

namespace AppBundle\Form;

use AppBundle\Entity\Countries;
use AppBundle\Entity\States;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddressType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add(
                'address',
                TextType::class,
                [
                    'label' => 'trav.location'
                ]
            )
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
            );

    }

    public function getName()
    {
        return 'app_bundle_address_type';
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefault(
            [
                'data_class' => 'AppBundle\Entity\Address'
            ]
        );
    }
}
