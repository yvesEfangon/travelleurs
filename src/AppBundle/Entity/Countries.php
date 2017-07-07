<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 21/06/17
 * Time: 01:24
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class Countries
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountriesRepository")
 * @ORM\Table(name="countries")
 */
class Countries
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */private $id;

    /**
     * @ORM\Column(name="country_code",type="string", nullable=false)
     */
    private $countryCode;

    /**
     * @ORM\Column(name="country_name",type="string", nullable=false)
     */
    private $countryName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Countries
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
     * @return Countries
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param mixed $countryName
     * @return Countries
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;

        return $this;
    }



}