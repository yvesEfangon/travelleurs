<?php

namespace AppBundle\Form;

use AppBundle\Entity\Countries;
use AppBundle\Entity\States;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddressType extends AbstractType
{
    private $_em;
    private $select_country;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->_em  = $options['entity_manager'];
        $data  = $options['data'];
        $this->select_country  = $data['country_id'];


        $builder->
            add('country', EntityType::class, array(
                    'placeholder'   => '--- Select your Country ---',
                    'class' => 'AppBundle:Countries',
                    'choice_label'=>'country_name',
                    'mapped' => false)
            )
        ->add(
            'submit',
            SubmitType::class
        )
        ;

        $addElements = function (FormInterface $form, $country_id = null) {
            // Remove the submit button, we will place this at the end of the form later
            $submit = $form->get('submit');
            $form->remove('submit');



            // Cities are empty, unless we actually supplied a country
            $cities = array();
            $states = array();

            if ($country_id) {
                $country = $this->_em->getRepository('AppBundle:Countries')->find($country_id);
                // Fetch the cities and the states from specified country
               // $cities = $this->_em->getRepository('AppBundle:Cities')->findBy(['countryCode' => $country->getCountryCode()]);
                //$states = $this->_em->getRepository('AppBundle:States')->findBy(['countryCode' => $country->getCountryCode()]);


                // Add the city element
                $form->add('state', EntityType::class, array(
                    'placeholder' => '--- Choose the country first ----',
                    'empty_data' => 'empty',
                    'class' => 'AppBundle:States',
                    'query_builder' => function (EntityRepository $_er) use ($country) {
                        return $_er->createQueryBuilder('s')
                            ->where('s.countryCode= :st')
                            ->setParameter('st', $country->getCountryCode())
                            ->addOrderBy('s.stateName', 'ASC');
                    },
                    'choice_label' => 'stateName',

                ));
                // Add the city element
                $form->add('city', 'entity', array(
                    'placeholder' => '--- Choose the country first ----',
                    'empty_data' => 'empty',
                    'class' => 'AppBundle:Cities',
                    'query_builder' => function (EntityRepository $_er) use ($country) {
                        return $_er->createQueryBuilder('c')
                            ->where('c.countryCode= :cc')
                            ->setParameter('cc', $country->getCountryCode())
                            ->addOrderBy('c.city', 'ASC');
                    },
                    'choice_label' => 'city',

                ));
            }else{
                // Add the city element
                $form->add('state', EntityType::class, array(
                    'placeholder' => '--- Choose the country first ----',
                    'empty_data' => 'empty',
                    'class' => 'AppBundle:States',

                    'choice_label' => 'stateName',
                    'choices' => $states,
                ));
                // Add the city element
                $form->add('city', EntityType::class, array(
                    'placeholder' => '--- Choose the country first ----',
                    'empty_data' => 'empty',
                    'class' => 'AppBundle:Cities',

                    'choice_label' => 'city',
                    'choices' => $cities,
                ));
            }
            // Add submit button again, this time, it's back at the end of the form
            $form->add($submit);
        };

        //$builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($addElements){


                $addElements($event->getForm(),$this->select_country);
            });
        $builder->get('country')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($addElements) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $country = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $addElements($event->getForm()->getParent(), $country);
            }
        );

        //$builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));

    }

    private function addElements(FormInterface $form, Countries $country = null) {
        // Remove the submit button, we will place this at the end of the form later
        $submit = $form->get('submit');
        $form->remove('submit');


        // Add the Country element
        $form->add('country', EntityType::class, array(
                'data' => $country,
                'placeholder'   => '--- Select your Country ---',
                'class' => 'AppBundle\Entity\Countries',
                'choice_label'=>'country_name',
                'mapped' => false)
        );

        // Cities are empty, unless we actually supplied a country
        $cities = array();
        $states = array();

        if ($country) {
            // Fetch the cities and the states from specified country
            $cities = $this->_em->getRepository('AppBundle:Cities')->findBy(['countryCode' => $country->getCountryCode()]);
            $states = $this->_em->getRepository('AppBundle:States')->findBy(['countryCode' => $country->getCountryCode()]);
        }

        // Add the city element
        $form->add('state', EntityType::class, array(
            'placeholder' => '--- Choose the country first ----',
            'class' => 'AppBundle\Entity\States',
            'choices' => $states,
        ));
        // Add the city element
        $form->add('city', EntityType::class, array(
            'placeholder' => '--- Choose the country first ----',
            'class' => 'AppBundle\Entity\Cities',
            'choices' => $cities,
        ));

        // Add submit button again, this time, it's back at the end of the form
        $form->add($submit);
    }

    public function onPreSubmit(FormEvent $event) {
        $form = $event->getForm();
        $data = $event->getData();

        // Note that the data is not yet hydrated into the entity.
        $country = $this->_em->getRepository('AppBundle:Countries')->find($data['country']);
        $this->addElements($form, $country);
    }


    public function onPreSetData(FormEvent $event) {
        $address = $event->getData();
        $form = $event->getForm();

        // We might have an empty account (when we insert a new account, for instance)
        $country = $address->getCountry() ? $address->getCountry() : null;
        $this->addElements($form, $country);
    }

    public function getName()
    {
        return 'app_bundle_address_type';
    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setRequired('entity_manager');
    }
}
