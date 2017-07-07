<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 21/06/17
 * Time: 01:47
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StatesRepository")
 * @ORM\Table(name="states")
 */
class States
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="country_code",type="string")
     */
    private $countryCode;

    /**
     * @ORM\Column(name="state_code",type="string")
     */
    private $stateCode;

    /**
     * @ORM\Column(name="state_name",type="string")
     */
    private $stateName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return States
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
     * @param $countryCode
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * @param mixed $stateCode
     * @return States
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStateName()
    {
        return $this->stateName;
    }

    /**
     * @param mixed $stateName
     * @return States
     */
    public function setStateName($stateName)
    {
        $this->stateName = $stateName;

        return $this;
    }



}