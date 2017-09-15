<?php

namespace AppBundle\Model;


use Symfony\Component\HttpFoundation\Request;

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
    protected $placeId;
    protected $dateDepart;
    protected $dateFinSejour;
    protected $genreVoyageurs;
    protected $ageMax;
    protected $ageMin;
    protected $distance;
    protected $sort;
    protected $budget;

    // définit l'ordre de tri par défaut
    protected $direction = 'desc';

    // une proprité "virtuelle" pour ajouter un champ select
    protected $sortSelect;

    // le numéro de page par défault
    protected $page = 1;

    // le nombre d'items par page
    protected $perPage = 10;

    public function __construct()
    {

        $this->initSortSelect();
    }

    // autres getters et setters

    public function handleRequest(Request $request)
    {
        $this->setPage($request->get('page', 1));
        $this->setSort($request->get('sort', 'createdOn'));
        $this->setDirection($request->get('direction', 'desc'));
    }

    public function getPage()
    {
        return $this->page;
    }


    public function setPage($page)
    {
        if ($page != null) {
            $this->page = $page;
        }

        return $this;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function setPerPage($perPage=null)
    {
        if($perPage != null){
            $this->perPage = $perPage;
        }

        return $this;
    }

    public function setSortSelect($sortSelect)
    {
        if ($sortSelect != null) {
            $this->sortSelect =  $sortSelect;
        }
    }

    public function getSortSelect()
    {
        return $this->sort.' '.$this->direction;
    }

    public function initSortSelect()
    {
        $this->sortSelect = $this->sort.' '.$this->direction;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setSort($sort)
    {
        if ($sort != null) {
            $this->sort = $sort;
            $this->initSortSelect();
        }

        return $this;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function setDirection($direction)
    {
        if ($direction != null) {
            $this->direction = $direction;
            $this->initSortSelect();
        }

        return $this;
    }

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
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * @param mixed $placeId
     * @return MainSearch
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;

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

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     * @return MainSearch
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }




}