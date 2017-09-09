<?php

namespace AppBundle\Form;

use AppBundle\Entity\Genre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'genre',
                ChoiceType::class,
                [
                    'class' => 'AppBundle\Entity\Genre',
                    'choice_label' => 'genre'
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Genre::class
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_genre_type';
    }
}
