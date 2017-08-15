<?php

namespace AppBundle\Form;

use AppBundle\AppBundle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtapeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'lieuDepart',
            LieuType::class,
            [
                'label' => 'trav.departure'
            ]
            )
            ->add(
                'lieuArrivee',
                LieuType::class,
                [
                    'label' => 'trav.arrival'
                ]
            )
            ->add(
                'dateDepart',
                DateType::class,
                [
                    'label' => 'trav.departure.date',
                    'required' => true
                ]
            )
            ->add(
                'dateArrivee',
                DateType::class,
                [
                    'required' => true
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Etape'
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_etape_type';
    }
}
