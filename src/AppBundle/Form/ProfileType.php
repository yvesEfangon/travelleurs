<?php

namespace AppBundle\Form;

use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileType extends BaseType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options); // TODO: Change the autogenerated stub

        $builder->add('firstname',TextType::class,[
            'label'=>'trav.form.firstname'
        ])
        ->add('name',TextType::class,[
            'label'=>'trav.form.name'
        ])
        ;
    }


}
