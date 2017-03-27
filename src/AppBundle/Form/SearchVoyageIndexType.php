<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchVoyageIndexType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destination',TextType::class,
                [
                    'label'=>'trav.where.you.go',
                    'attr'=>[
                        'class'=>'form-control input-lg',
                        'placeholder'=>'trav.where.you.go'
                    ]
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        
    }

    public function getName()
    {
        return 'app_bundle_search_voyage_type';
    }
}
