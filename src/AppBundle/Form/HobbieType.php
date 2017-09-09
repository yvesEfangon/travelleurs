<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HobbieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'hobbie',
                EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Hobbie',
                    'multiple'  => true,
                    'expanded' => true
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'AppBundle\Entity\Hobbie'
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_hobbie_type';
    }
}
