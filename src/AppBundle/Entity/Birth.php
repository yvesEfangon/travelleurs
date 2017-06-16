<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 05/06/17
 * Time: 19:00
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BirthRepository")
 * @ORM\Table(name="birth")
 */
class Birth
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", name="birthdate",nullable=false)
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", name="birthcountry", nullable=true)
     */
    private $birthcountry;

    /**
     * @ORM\Column(type="string", name="birthcity", nullable=true)
     */
    private $birthcity;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublic;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     */
    private $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Birth
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     * @return Birth
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthcountry()
    {
        return $this->birthcountry;
    }

    /**
     * @param mixed $birthcountry
     * @return Birth
     */
    public function setBirthcountry($birthcountry)
    {
        $this->birthcountry = $birthcountry;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthcity()
    {
        return $this->birthcity;
    }

    /**
     * @param mixed $birthcity
     * @return Birth
     */
    public function setBirthcity($birthcity)
    {
        $this->birthcity = $birthcity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsPublic()
    {
        return $this->isPublic;
    }

    /**
     * @param mixed $isPublic
     * @return Birth
     */
    public function setIsPublic($isPublic)
    {
        $this->isPublic = $isPublic;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Birth
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


}