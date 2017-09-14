<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\GMapEntity;


/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LieuRepository")
 */
class Lieu extends GMapEntity

{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="geo_location", type="string", length=100, nullable=true)
     */
    private $geoLocation;

    /**
     *
     * @ORM\PrePersist
     */
    public function initGeoLocation(){
        $this->geoLocation =
            number_format(str_replace(",", ".", $this->getLat()), 8, '.', '')
            .",".
            number_format(str_replace(",", ".", $this->getLng()), 8, '.', '');
    }

    public function __construct()
    {

    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
       return 'Lieu';
    }

    /**
     * @return mixed
     */
    public function getGeoLocation()
    {
        return $this->geoLocation;
    }

    /**
     * @param mixed $geoLocation
     * @return GMapEntity
     */
    public function setGeoLocation($geoLocation)
    {
        $this->geoLocation = $geoLocation;

        return $this;
    }
}

