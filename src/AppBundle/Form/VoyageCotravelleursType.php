<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoyageCotravelleursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'app_bundle_voyage_cotravelleurs_type';
    }
}
