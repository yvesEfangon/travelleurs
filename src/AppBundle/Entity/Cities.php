<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 19/06/17
 * Time: 22:33
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Cities
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CitiesRepository")
 * @ORM\Table(name="cities", indexes={@ORM\Index(name="serach_idx",columns={"country_code","city_code","city"})})
 */
class Cities
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="country_code", type="string", nullable=false)
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="country_name", length=255, nullable=false)
     */
    private $countryName;

    /**
     * @var string
     *
     * @ORM\Column(name="state_code", length=10)
     */
    private $stateCode;

    /**
     * @var string
     *
     * @ORM\Column(name="state_name", length=255)
     */
    private $stateName;

    /**
     * @ORM\Column(name="city_code", type="string", nullable=true)
     */
    private $cityCode;



    /**
     * @ORM\Column(name="city", type="string", nullable=false)
     */
    private $city;



    /**
     * @ORM\Column(name="region", type="string")
     */
    private $region;

    /**
     * @ORM\Column(name="longitude", type="string")
     */
    private $longitude;

    /**
     * @ORM\Column(name="latitude", type="string")
     */
    private $latitude;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Cities
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param mixed $countryCode
     * @return Cities
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCityCode()
    {
        return $this->cityCode;
    }

    /**
     * @param mixed $cityCode
     * @return Cities
     */
    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Cities
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param $longitude
     * @return Cities
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param $latitude
     * @return Cities
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     * @return Cities
     */
    public function setRegion($region)
    {
        $this->region = $region;
        
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     * @return Cities
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @param string $stateCode
     * @return Cities
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * @param string $stateName
     * @return Cities
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;
        return $this;
    }



}