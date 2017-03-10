<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * UserData
 *
 * @ORM\Table(name="user_data")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserDataRepository")
 */
class UserData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @var Image
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image",cascade={"persist"})
     */
    private $photoProfil;

    /**
     * @var string
     *
     * @ORM\Column(name="marital_status", type="string", length=100)
     */
    private $maritalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="degre_conversation", type="string", length=255)
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
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     */
    private $user;

    public function __construct()
    {
        $this->activities       = new ArrayCollection();
        $this->causes_sociales  = new ArrayCollection();
        $this->hobbies      = new ArrayCollection();
        $this->phobbies     = new ArrayCollection();
        $this->langues      = new ArrayCollection();
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
     * Set fumeur
     *
     * @param boolean $fumeur
     *
     * @return UserData
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;

        return $this;
    }

    /**
     * Get fumeur
     *
     * @return bool
     */
    public function getFumeur()
    {
        return $this->fumeur;
    }

    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return UserData
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set photoProfil
     *
     * @param Image $photoProfil
     *
     * @return UserData
     */
    public function setPhotoProfil($photoProfil)
    {
        $this->photoProfil = $photoProfil;

        return $this;
    }

    /**
     * Get photoProfil
     *
     * @return Image
     */
    public function getPhotoProfil()
    {
        return $this->photoProfil;
    }

    /**
     * Set maritalStatus
     *
     * @param string $maritalStatus
     *
     * @return UserData
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    /**
     * Get maritalStatus
     *
     * @return string
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * Set degreConversation
     *
     * @param string $degreConversation
     *
     * @return UserData
     */
    public function setDegreConversation($degreConversation)
    {
        $this->degreConversation = $degreConversation;

        return $this;
    }

    /**
     * Get degreConversation
     *
     * @return string
     */
    public function getDegreConversation()
    {
        return $this->degreConversation;
    }

    /**
     * @return mixed
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @return User
     */
    public function addActivity(ActivitesSportives $activity)
    {
        $this->activities[] = $activity;
        return $this;
    }

    public function removeActivity(ActivitesSportives $activity){
        $this->activities->removeElement($activity);

        return $this;
    }

    /**
     * @param ActivitesSportives $activity
     * @return bool
     */
    public function hasActivity(ActivitesSportives $activity){
        return $this->activities->exists($activity);
    }
    /**
     * @return mixed
     */
    public function getCausesSociales()
    {
        return $this->causes_sociales;
    }


    /**
     * @param mixed $causes_sociales
     * @return User
     */
    public function addCauseSociale(CausesSociales $cause_sociale)
    {
        $this->causes_sociales[] = $cause_sociale;
        return $this;
    }

    public function removeCauseSociale(CausesSociales $cause_sociale){
        $this->causes_sociales->removeElement($cause_sociale);

        return $this;
    }

    /**
     * @param CausesSociales $cause_sociale
     * @return bool
     */
    public function hasCauseSociale(CausesSociales $cause_sociale){

        return $this->causes_sociales->exists($cause_sociale);
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
    public function addHobbie(Hobbie $hobbie)
    {
        $this->hobbies[] = $hobbie;
        return $this;
    }

    /**
     * @param Hobbie $hobbie
     * @return $this
     */
    public function removeHobbie(Hobbie $hobbie){
        $this->hobbies->removeElement($hobbie);

        return $this;
    }

    /**
     * @param Hobbie $hobbie
     * @return bool
     */
    public function hasHobbie(Hobbie $hobbie){
        return $this->hobbies->exists($hobbie);
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
    public function addPhobbie(Phobbie $phobbie)
    {
        $this->phobbies[] = $phobbie;
        return $this;
    }

    public function removePhobbie(Phobbie $phobbie){
        $this->phobbies->removeElement($phobbie);

        return $this;
    }

    /**
     * @param Phobbie $phobbie
     * @return bool
     */
    public function hasPhobbie(Phobbie $phobbie){
        return $this->phobbies->exists($phobbie);
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
    public function addLangue(Langue $langue)
    {
        $this->langues[] = $langue;
        return $this;
    }

    /**
     * @param Langue $langue
     * @return $this
     */
    public function removeLangue(Langue $langue){
        $this->langues->removeElement($langue);

        return $this;
    }

    /**
     * @param Langue $langue
     * @return bool
     */
    public function hasLangue(Langue $langue){
        return $this->langues->exists($langue);
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $data
     * @return User
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}

