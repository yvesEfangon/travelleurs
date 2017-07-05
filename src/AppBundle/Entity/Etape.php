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
     * @var double
     *
     * @ORM\Column(name="budget", type="float")
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=10, nullable=true)
     */
    private $currency;


    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", cascade={"persist"})
     *
     */
    private $tag;


    /**
     * @var Theme
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Theme",cascade={"persist"})
     */
    private $themes;

    /**
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\CentreInteret", cascade={"persist"})
     *
     */
    private $centreInteret;

    /**
     * @var Cities
     * 
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $villeDepart;

    /**
     * @var Cities
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $villeArrivee;
    
    
    public function __construct()
    {
        $this->themes   = new ArrayCollection();
        $this->tag      = new ArrayCollection();
        $this->centreInteret    = new ArrayCollection();
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
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     * @return Voyage
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag){
        if(!$this->hasTag($tag)) $this->tag[]    = $tag;

        return $this;
    }

    public function hasTag(Tag $tag){
        return $this->tag->exists($tag);
    }
    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag){
        $this->tag->removeElement($tag);

        return $this;
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

    /**
     * @return mixed
     */
    public function getCentreInteret()
    {
        return $this->centreInteret;
    }

    /**
     * @param mixed $centreInteret
     * @return Etape
     */
    public function setCentreInteret($centreInteret)
    {
        $this->centreInteret = $centreInteret;
        return $this;
    }

    public function hasCentreInteret(CentreInteret $centreInteret)
    {
        return $this->centreInteret->exists($centreInteret);
    }

    public function removeCentreInteret(CentreInteret$centreInteret)
    {
        $this->centreInteret->removeElement($centreInteret);

        return $this;
    }

    public function addCentreInteret(CentreInteret $centreInteret){
        if(!$this->hasCentreInteret($centreInteret)) $this->centreInteret[] = $centreInteret;

        return $this;
    }

    /**
     * @return Cities
     */
    public function getVilleDepart()
    {
        return $this->villeDepart;
    }

    /**
     * @param Cities $villeDepart
     * @return Etape
     */
    public function setVilleDepart($villeDepart)
    {
        $this->villeDepart = $villeDepart;
        return $this;
    }

    /**
     * @return Cities
     */
    public function getVilleArrivee()
    {
        return $this->villeArrivee;
    }

    /**
     * @param Cities $villeArrivee
     * @return Etape
     */
    public function setVilleArrivee($villeArrivee)
    {
        $this->villeArrivee = $villeArrivee;
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


}

