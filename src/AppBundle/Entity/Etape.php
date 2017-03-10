<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Etape
 *
 * @ORM\Table(name="etape")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtapeRepository")
 */
class Etape
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
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=50)
     */
    private $status;

    /**
     * @var Voyage
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Voyage")
     * @ORM\JoinColumn(nullable=false)
     */
    private $voyage;

    /**
     * @var niveau_confort
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\niveau_confort")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveauConfort;

    /**
     * @var int
     *
     * @ORM\Column(name="nbre_covoyageurs", type="integer", nullable=true)
     */
    private $nbreCovoyageurs;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_depart", type="datetime", nullable=true)
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_arrivee", type="datetime", nullable=true)
     */
    private $dateArrivee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="datetime")
     */
    private $createdOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifiedOn", type="datetime")
     */
    private $modifiedOn;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User",cascade={"persist"})
     */
    private $creator;

   



    /**
     * @var Theme
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Theme",cascade={"persist"})
     */
    private $themes;



    public function __construct()
    {
        $this->themes   = new ArrayCollection();
        $this->createdOn = new \DateTime();
        $this->modifiedOn = new \DateTime();
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
     * Set status
     *
     * @param string $status
     *
     * @return Etape
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set nbreCovoyageurs
     *
     * @param integer $nbreCovoyageurs
     *
     * @return Etape
     */
    public function setNbreCovoyageurs($nbreCovoyageurs)
    {
        $this->nbreCovoyageurs = $nbreCovoyageurs;

        return $this;
    }

    /**
     * Get nbreCovoyageurs
     *
     * @return int
     */
    public function getNbreCovoyageurs()
    {
        return $this->nbreCovoyageurs;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Etape
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateArrivee
     *
     * @param \DateTime $dateArrivee
     *
     * @return Etape
     */
    public function setDateArrivee($dateArrivee)
    {
        $this->dateArrivee = $dateArrivee;

        return $this;
    }

    /**
     * Get dateArrivee
     *
     * @return \DateTime
     */
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }


    /**
     * @return int
     */
    public function getVoyage()
    {
        return $this->voyage;
    }

    /**
     * @param Voyage $voyage
     * @return $this
     */
    public function setVoyage(Voyage $voyage)
    {
        $this->voyage = $voyage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNiveauConfort()
    {
        return $this->niveauConfort;
    }

    /**
     * @param mixed $niveauConfort
     * @return Etape
     */
    public function setNiveauConfort($niveauConfort)
    {
        $this->niveauConfort = $niveauConfort;
        return $this;
    }



    /**
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param User $creator
     */
    public function setCreator(User $creator)
    {
        $this->creator  = $creator;
        
        return $this;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isCreator(User $user){
        return $this->creator->getId() == $user->getId();
    }

    /**
     * @return Theme
     */
    public function getThemes()
    {
        return $this->themes;
    }

    public function addTheme(Theme $theme){

        if(!$this->hasTheme($theme)) $this->themes[]     = $theme;

        return $this;
    }

    public function removeTheme(Theme $theme){
        $this->themes->removeElement($theme);

        return $this;
    }

    /**
     * @param Theme $theme
     * @return bool
     */
    public function hasTheme(Theme $theme){
        return $this->themes->exists($theme);
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
     * @return Etape
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedOn()
    {
        return $this->modifiedOn;
    }

    /**
     * @param \DateTime $modifiedOn
     * @return Etape
     */
    public function setModifiedOn($modifiedOn)
    {
        $this->modifiedOn = $modifiedOn;
        return $this;
    }

    

}

