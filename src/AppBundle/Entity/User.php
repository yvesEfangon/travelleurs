<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\MessageBundle\Model\ParticipantInterface;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * use Symfony\Component\Security\Core\User\UserInterface
 */
class User extends BaseUser implements ParticipantInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, unique=false, nullable=true)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="birthdate", type="datetime", unique=false, nullable=true)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=255, nullable=true)
     */
    private $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="administrative_area", type="string", length=255, nullable=true)
     */
    private $administrativeArea;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var float     Latitude of the position
     *
     * @ORM\Column(name="lat", type="float", nullable=true)
     */
    private $lat;

    /**
     * @var float     Longitude of the position
     *
     * @ORM\Column(name="lng", type="float", nullable=true)
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="place_id", type="string", nullable=false)
     */
    private $placeId;

    /**
     * @var string
     *
     *@ORM\OneToOne(targetEntity="AppBundle\Entity\Image",cascade={"persist"})
     */
    private $photoProfile;

    /**
     * @var bool
     *
     * @ORM\Column(name="fumeur", type="boolean")
     */
    private $fumeur;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="text")
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="marital_status", type="string", length=20)
     */
    private $maritalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="degre_conversation", type="string", length=20)
     */
    private $degreConversation;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ActivitesSportives", cascade={"persist"})
     */
    private $activities;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\CausesSociales",cascade={"persist"})
     */
    private $causes_sociales;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Hobbie",cascade={"persist"})
     *
     */
    private $hobbies;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Phobbie",cascade={"persist"})
     */
    private $phobbies;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Langue",cascade={"persist"})
     */
    private $langues;
    /**
     * Get id
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();

        $this->activities       = new ArrayCollection();
        $this->causes_sociales  = new ArrayCollection();
        $this->hobbies      = new ArrayCollection();
        $this->phobbies     = new ArrayCollection();
        $this->langues      = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname( $firstname )
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @param $role
     * @return bool
     */
    public function isGranted($role)
    {
        return in_array($role, $this->getRoles());
    }

    /**
     * @return mixed
     */
    public function getUserData()
    {
        return $this->userData;
    }

    /**
     * @param mixed $userData
     */
    public function setUserData($userData)
    {
        $this->userData = $userData;
    }

    /**
     * @return string
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param string $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * @return User
     */
    public function setAdministrativeArea($administrativeArea)
    {
        $this->administrativeArea = $administrativeArea;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param string $locality
     * @return User
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return User
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     * @return User
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
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
     * @return User
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoProfile()
    {
        return $this->photoProfile;
    }

    /**
     * @param Image $photoProfile
     * @return User
     */
    public function setPhotoProfile(Image $photoProfile)
    {
        $this->photoProfile = $photoProfile;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isFumeur()
    {
        return $this->fumeur;
    }

    /**
     * @param boolean $fumeur
     * @return User
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;
        
        return $this;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return string
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * @param string $maritalStatus
     * @return User
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    /**
     * @return string
     */
    public function getDegreConversation()
    {
        return $this->degreConversation;
    }

    /**
     * @param string $degreConversation
     * @return User
     */
    public function setDegreConversation($degreConversation)
    {
        $this->degreConversation = $degreConversation;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @param ArrayCollection $activities
     * @return User
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCausesSociales()
    {
        return $this->causes_sociales;
    }

    /**
     * @param ArrayCollection $causes_sociales
     * @return User
     */
    public function setCausesSociales($causes_sociales)
    {
        $this->causes_sociales = $causes_sociales;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * @param ArrayCollection $hobbies
     * @return User
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getPhobbies()
    {
        return $this->phobbies;
    }

    /**
     * @param ArrayCollection $phobbies
     * @return User
     */
    public function setPhobbies($phobbies)
    {
        $this->phobbies = $phobbies;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getLangues()
    {
        return $this->langues;
    }

    /**
     * @param ArrayCollection $langues
     * @return User
     */
    public function setLangues($langues)
    {
        $this->langues = $langues;

        return $this;
    }





}
