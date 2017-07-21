<?php

namespace AppBundle\Form;

use AppBundle\AppBundle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtapeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'villeDepart',
            EntityType::class,
            [
                'class' => 'AppBundle\Entity\Cities',
                'choice_label'=>'city',
                'placeholder' => 'Select',
                'expanded' => false,
                'multiple' => false,
                'required' => true,
                'label' => 'trav.departure'
            ]
        )
            ->add(
                'villeArrivee',
                EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Cities',
                    'choice_label' => 'city',
                    'placeholder' => 'Select',
                    'expanded' => false,
                    'multiple' => false,
                    'required' => true,
                    'label' => 'trav.arrival'
                ]
            )
            ->add(
                'dateDepart',
                DateType::HTML5_FORMAT,
                [
                    'label' => 'trav.departure.date',
                    'required' => true
                ]
            )
            ->add(
                'dateArrivee',
                DateType::HTML5_FORMAT
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
