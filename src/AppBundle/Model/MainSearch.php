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
    protected $dateDepart;
    protected $dateFinSejour;
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
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * @param mixed $dateDepart1
     * @return MainSearch
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }



    /**
     * @return mixed
     */
    public function getDateFinSejour()
    {
        return $this->dateFinSejour;
    }

    /**
     * @param mixed $dateFinSejour1
     * @return MainSearch
     */
    public function setDateFinSejour($dateFinSejour)
    {
        $this->dateFinSejour = $dateFinSejour;

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