<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 15/08/2017
 * Time: 10:07
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class GMapEntity
 * @package AppBundle\Entity
 *
 */

abstract class GMapEntity
{
    /**
     * 
     *
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * 
     *
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=255, nullable=true)
     */
    protected $locality;

    /**
     * 
     *
     * @var string
     *
     * @ORM\Column(name="administrative_area", type="string", length=255, nullable=true)
     */
    protected $administrativeArea;

    /**
     * 
     *
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    protected $country;

    /**
     * 
     *
     * @var float     Latitude of the position
     *
     * @ORM\Column(name="lat", type="float", nullable=true)
     */
    protected $lat;

    /**
     * 
     *
     * @var float     Longitude of the position
     *
     * @ORM\Column(name="lng", type="float", nullable=true)
     */
    protected $lng;


    /**
     * 
     *
     * @var string
     *
     * @ORM\Column(name="place_id", type="string", nullable=false)
     */
    protected $placeId;



    /**
     * @param $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * @param $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param $lat
     */
    public function setLat($lat)
    {
        if (is_string($lat)) {
            $lat = (float)$lat;
        }
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param $lng
     */
    public function setLng($lng)
    {
        if (is_string($lng)) {
            $lng = (float)$lng;
        }
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * @param string $placeId
     * @return GMapEntity
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdministrativeArea()
    {
        return $this->administrativeArea;
    }

    /**
     * @param string $administrativeArea
     * @return GMapEntity
     */
    public function setAdministrativeArea($administrativeArea)
    {
        $this->administrativeArea = $administrativeArea;

        return $this;
    }






}