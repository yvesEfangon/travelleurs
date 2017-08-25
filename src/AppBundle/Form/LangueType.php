<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LangueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'code',
                EntityType::class,
                [
                    'class' => 'AppBundle\Entity\Langue',
                    'choice_label' => 'code'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
            $resolver->setDefaults(
                [
                    'data_class' => 'AppBundle\Entity\Langue'
                ]
            );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_langue_type';
    }
}
