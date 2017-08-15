<?php

namespace AppBundle\Form;

use AppBundle\Entity\GMapEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GMapType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => GMapEntity::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_gmap_type';
    }
}
