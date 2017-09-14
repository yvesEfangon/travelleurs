<?php

namespace AppBundle\Model;


/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 14/09/2017
 * Time: 11:51
 */
class MainSearch
{

    protected $address;
    protected $lat;
    protected $lng;
    protected $locality;
    protected $country;
    protected $administrative_area;
    protected $dateDepart1;
    protected $dateDepart2;
    protected $dateFinSejour1;
    protected $dateFinSejour2;
    protected $genreVoyageurs;
    protected $ageMax;
    protected $ageMin;
    protected $distance;

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return MainSearch
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     * @return MainSearch
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     * @return MainSearch
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param mixed $locality
     * @return MainSearch
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return MainSearch
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdministrativeArea()
    {
        return $this->administrative_area;
    }

    /**
     * @param mixed $administrative_area
     * @return MainSearch
     */
    public function setAdministrativeArea($administrative_area)
    {
        $this->administrative_area = $administrative_area;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDepart1()
    {
        return $this->dateDepart1;
    }

    /**
     * @param mixed $dateDepart1
     * @return MainSearch
     */
    public function setDateDepart1($dateDepart1)
    {
        $this->dateDepart1 = $dateDepart1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDepart2()
    {
        return $this->dateDepart2;
    }

    /**
     * @param mixed $dateDepart2
     * @return MainSearch
     */
    public function setDateDepart2($dateDepart2)
    {
        $this->dateDepart2 = $dateDepart2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateFinSejour1()
    {
        return $this->dateFinSejour1;
    }

    /**
     * @param mixed $dateFinSejour1
     * @return MainSearch
     */
    public function setDateFinSejour1($dateFinSejour1)
    {
        $this->dateFinSejour1 = $dateFinSejour1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateFinSejour2()
    {
        return $this->dateFinSejour2;
    }

    /**
     * @param mixed $dateFinSejour2
     * @return MainSearch
     */
    public function setDateFinSejour2($dateFinSejour2)
    {
        $this->dateFinSejour2 = $dateFinSejour2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenreVoyageurs()
    {
        return $this->genreVoyageurs;
    }

    /**
     * @param mixed $genreVoyageurs
     * @return MainSearch
     */
    public function setGenreVoyageurs($genreVoyageurs)
    {
        $this->genreVoyageurs = $genreVoyageurs;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAgeMax()
    {
        return $this->ageMax;
    }

    /**
     * @param mixed $ageMax
     * @return MainSearch
     */
    public function setAgeMax($ageMax)
    {
        $this->ageMax = $ageMax;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * @param mixed $ageMin
     * @return MainSearch
     */
    public function setAgeMin($ageMin)
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @param mixed $distance
     * @return MainSearch
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }




}