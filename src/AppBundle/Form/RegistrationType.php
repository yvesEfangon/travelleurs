<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$builder
            ->add('firstname',TextType::class,
                array(
                    'label'=>'trav.form.firstname',
                    'required'=>true,
                    'attr'=>array('placeholder'=>'trav.form.firstname','class'=>'form-control')
                ));*/
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
