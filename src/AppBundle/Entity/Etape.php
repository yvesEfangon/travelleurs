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
     * @var Lieu
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Lieu", cascade={"persist"})
     */
    private $lieuDepart;

    /**
     * @var Lieu
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Lieu", cascade={"persist"})
     */
    private $lieuArrivee;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifiedOn", type="datetime")
     */
    private $modifiedOn;


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


    
    
    public function __construct()
    {
        $this->themes   = new ArrayCollection();
        $this->tag      = new ArrayCollection();
        $this->centreInteret    = new ArrayCollection();
        $this->createdOn = new \DateTime();
        $this->modifiedOn = new \DateTime();
        $this->lieuArrivee  = new Lieu();
        $this->lieuDepart   = new Lieu();
        $this->status       = 'OPEN';
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
     * @return Lieu
     */
    public function getLieuDepart()
    {
        return $this->lieuDepart;
    }

    /**
     * @param Lieu $lieuDepart
     * @return Etape
     */
    public function setLieuDepart($lieuDepart)
    {
        $this->lieuDepart = $lieuDepart;

        return $this;
    }

    /**
     * @return Lieu
     */
    public function getLieuArrivee()
    {
        return $this->lieuArrivee;
    }

    /**
     * @param Lieu $lieuArrivee
     * @return Etape
     */
    public function setLieuArrivee($lieuArrivee)
    {
        $this->lieuArrivee = $lieuArrivee;

        return $this;
    }


   }

