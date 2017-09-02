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
     *  @ORM\Column(name="genre", type="integer", nullable=true)
     */
    private $genre;

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
     * @ORM\Column(name="place_id", type="string", nullable=true)
     */
    private $placeId;

    /**
     * @var string
     *
     *@ORM\OneToOne(targetEntity="AppBundle\Entity\Image",cascade={"persist"})
     */
    private $photoProfile;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Langue", cascade={"persist"})
     */
    private $languages;

    /**
     * @var bool
     *
     * @ORM\Column(name="fumeur", type="boolean", nullable=true)
     */
    private $fumeur;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="text", nullable=true)
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="marital_status", type="string", length=100, nullable=true)
     */
    private $maritalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="degre_conversation", type="string", length=100, nullable=true)
     */
    private $degreConversation;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ActivitesSportives", cascade={"persist"})
     */
    private $sportActivities;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\CausesSociales",cascade={"persist"})
     */
    private $causesSociales;

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

    public function __construct()
    {
        $this->languages    = new ArrayCollection();
        $this->phobbies     = new ArrayCollection();
        $this->hobbies      = new ArrayCollection();
        $this->causesSociales   = new ArrayCollection();
        $this->sportActivities  = new ArrayCollection();

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

    /**
     * @return integer
     */
    public function getGenre()
    {
        return $this->genre;
    }


    /**
     * @param integer $genre
     * @return User
     */
    public function setGenre($genre)
    {
        $this->genre    = $genre;

        return $this;
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
     * @return Collection
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param Collection $languages
     * @return User
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * @param Langue $langue
     * @return bool
     */
    public function hasLanguage(Langue $langue){
        return $this->languages->contains($langue);
    }

    /**
     * @param Langue $langue
     * @return $this
     */
    public function addLanguage(Langue $langue){
        if(!$this->hasLanguage($langue)) $this->languages[]   = $langue;

        return $this;
    }

    /**
     * @param Langue $langue
     * @return $this
     */
    public function removeLangue(Langue $langue){
        if($this->hasLanguage($langue)) $this->languages->removeElement($langue);

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
     * @return ArrayCollection
     */
    public function getCausesSociales()
    {
        return $this->causesSociales;
    }

    /**
     * @param ArrayCollection $causesSociales
     * @return User
     */
    public function setCausesSociales($causesSociales)
    {
        $this->causesSociales = $causesSociales;

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
     * @return bool
     */
    public function isFumeur()
    {
        return $this->fumeur;
    }

    /**
     * @param bool $fumeur
     * @return User
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;

        return $this;
    }
    public function hasElement(ArrayCollection $Object, $elt){
        return $Object->contains($elt);
    }

    public function addElement(ArrayCollection $Object, $elt)
    {
        if(!$this->hasElement($Object,$elt)) $Object[]  = $elt;

        return $this;
    }

    public function removeElement(ArrayCollection $Object,$elt){
        if(!$this->hasElement($Object,$elt)) $Object->removeElement($elt);

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
     * @param Hobbie $hobbie
     * @return User
     */
    public function addHobbie(Hobbie $hobbie){
      return $this->addElement($this->hobbies,$hobbie);
    }

    /**
     * @param Hobbie $hobbie
     * @return User
     */
    public function removeHobbie(Hobbie $hobbie){
        return $this->removeElement($this->hobbies, $hobbie);
    }

    /**
     * @param Phobbie $phobbie
     * @return User
     */
    public function addPhobbie(Phobbie $phobbie){
        return $this->addElement($this->phobbies, $phobbie);
    }

    /**
     * @param Phobbie $phobbie
     * @return User
     */
    public function removePhobbie(Phobbie $phobbie)
    {
        return $this->removeElement($this->phobbies, $phobbie);
    }

    /**
     * @param CausesSociales $causesSociale
     * @return User
     */
    public function addCauseSociale(CausesSociales $causesSociale)
    {
        return $this->addElement($this->causesSociales, $causesSociale);
    }

    /**
     * @param CausesSociales $causeSociale
     * @return User
     */
    public function removeCauseSociale(CausesSociales $causeSociale)
    {
        return $this->removeElement($this->causesSociales, $causeSociale);
    }

    /**
     * @param ActivitesSportives $act
     * @return User
     */
    public function addSportActivity(ActivitesSportives $act)
    {
        return $this->addElement($this->sportActivities,$act);
    }

    /**
     * @param ActivitesSportives $act
     * @return User
     */
    public function removeSportActivity(ActivitesSportives $act)
    {
        return $this->removeElement($this->sportActivities, $act);
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
    public function getSportActivities()
    {
        return $this->sportActivities;
    }

    /**
     * @param ArrayCollection $sportActivities
     * @return User
     */
    public function setSportActivities($sportActivities)
    {
        $this->sportActivities = $sportActivities;

        return $this;
    }



}
