<?php

namespace AppBundle\RepositoryManipulat;

use AppBundle\Entity\Address;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 15/08/2017
 * Time: 13:52
 */
class AddressRepoManipulator
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $values
     * @return Address
     */
    public function formatAddress(Array $values){
        $address = new Address();

        $address->setAddress($values['address']);
        $address->setCountry($values['country']);
        $address->setAdministrativeArea($values['administrative_area']);
        $address->setLat($values['lat']);
        $address->setLng($values['lng']);
        $address->setPlaceId($values['place_id']);

        return $address;
    }

}