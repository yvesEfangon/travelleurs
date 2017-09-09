<?php

namespace AppBundle\Form;

use AppBundle\Entity\Theme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThemeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'libelle',
                EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Theme',
                    'choice_label' => 'libelle',
                    'multiple'  => true,
                    'expanded' => true
                ]

            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Theme::class
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_theme_type';
    }
}
