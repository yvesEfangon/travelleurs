<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 15/08/2017
 * Time: 14:04
 */

namespace AppBundle\RepositoryManipulat;

use AppBundle\Entity\Lieu;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LieuRepoManipulator
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param array $values
     * @return Lieu
     */
    public function formatLieu(Array $values){
        $lieu = new Lieu();

        $lieu->setAddress($values['address']);
        $lieu->setLocality($values['locality']);
        $lieu->setCountry($values['country']);
        $lieu->setAdministrativeArea($values['administrative_area']);
        $lieu->setLat($values['lat']);
        $lieu->setLng($values['lng']);
        $lieu->setPlaceId($values['place_id']);

        return $lieu;
    }
}