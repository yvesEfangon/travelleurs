<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'imageFile',
            VichImageType::class,
            [
                'required' => true,
                'allow_delete' => true,
                'label' => ' ',
                'label_attr' => ['class' => 'hidden'],
            ]
            )
        ->add('submit',SubmitType::class,['label' => 'trav.upload.picture']);
    }


    public function getBlockPrefix()
    {
        return 'app_bundle_image_type';
    }


}
