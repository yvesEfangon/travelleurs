<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Voyage
 *
 * @ORM\Table(name="voyage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VoyageRepository")
 */
class Voyage
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     *
     */
    private $participants;
    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="annonce", type="text", nullable=true)
     */
    private $annonce;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     */
    private $createdOn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean", nullable=false)
     */
    private $published;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string",length=10, nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_of_participants", type="integer", nullable=true)
     */
    private $numberOfParticipants;

    /**
     * @var string
     *
     * @ORM\Column(name="owner_is_alone", type="string",length=20, nullable=true)
     */
    private $ownerIsAlone;

    /**
     * @var string
     *
     * @ORM\Column(name="genre_voyageurs", type="string", length=20)
     */
    private $genreVoyageurs;

    /**
     * @var boolean
     *
     * @ORM\Column(name="smocker_allowed", type="boolean")
     */
    private $smockerAllowed;

    /**
     * @var string
     *
     * @ORM\Column(name="type_de_voyage", type="string", length=20, nullable=true)
     */
    private $typeDeVoyage;

    /**
     * @var boolean
     *
     * @ORM\Column(name="strict_criteria", type="boolean")
     */
    private $strict_criteria;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=20)
     */
    private $currency;

    /**
     * @var double
     *
     * @ORM\Column(name="budget", type="float")
     */
    private $budget;

    /**
     * Voyage constructor.
     */
    public function __construct()
    {
        $this->participants     = new ArrayCollection();

        $this->createdOn        = new \DateTime();
        $this->published        = 0;
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
     * Set photo
     *
     * @param string $photo
     *
     * @return Voyage
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set annonce
     *
     * @param string $annonce
     *
     * @return Voyage
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return string
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }


    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return Voyage
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isOwner(User $user){
        
        return ($this->owner->getId() == $user->getId());
    }
    /**
     * @return ArrayCollection
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param ArrayCollection $participants
     * @return Voyage
     */
    public function setParticipants(ArrayCollection $participants)
    {
        $this->participants = $participants;

        return $this;
    }

    public function addParticipant(User $participant)
    {
        if(!$this->hasParticipant($participant)) $this->participants[]   = $participant;

        return $this;
    }
    /**
     * @param User $participant
     */
    public function removeParticipant(User $participant)
    {
        $this->participants->removeElement($participant);
    }

    /**
     * @param User $participant
     * @return bool
     */
    public function hasParticipant(User $participant)
    {
        return $this->participants->exists($participant);
    }
    /**
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param \DateTime $createdOn
     * @return Voyage
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param boolean $published
     * @return Voyage
     */
    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Voyage
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfParticipants()
    {
        return $this->numberOfParticipants;
    }

    /**
     * @param int $numberOfParticipants
     * @return Voyage
     */
    public function setNumberOfParticipants($numberOfParticipants)
    {
        $this->numberOfParticipants = $numberOfParticipants;
        return $this;
    }

    /**
     * @return string
     */
    public function getOwnerIsAlone()
    {
        return $this->ownerIsAlone;
    }

    /**
     * @param string $ownerIsAlone
     * @return Voyage
     */
    public function setOwnerIsAlone($ownerIsAlone)
    {
        $this->ownerIsAlone = $ownerIsAlone;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenreVoyageurs()
    {
        return $this->genreVoyageurs;
    }

    /**
     * @param string $genreVoyageurs
     * @return Voyage
     */
    public function setGenreVoyageurs($genreVoyageurs)
    {
        $this->genreVoyageurs = $genreVoyageurs;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isSmockerAllowed()
    {
        return $this->smockerAllowed;
    }

    /**
     * @param boolean $smockerAllowed
     * @return Voyage
     */
    public function setSmockerAllowed($smockerAllowed)
    {
        $this->smockerAllowed = $smockerAllowed;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeDeVoyage()
    {
        return $this->typeDeVoyage;
    }

    /**
     * @param string $typeDeVoyage
     * @return Voyage
     */
    public function setTypeDeVoyage($typeDeVoyage)
    {
        $this->typeDeVoyage = $typeDeVoyage;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isStrictCriteria()
    {
        return $this->strict_criteria;
    }

    /**
     * @param boolean $strict_criteria
     * @return Voyage
     */
    public function setStrictCriteria($strict_criteria)
    {
        $this->strict_criteria = $strict_criteria;
        return $this;
    }


    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param float $budget
     * @return Voyage
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
        return $this;
    }


}

