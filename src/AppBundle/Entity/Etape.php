<?php

namespace AppBundle\Entity;

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
     * @var int
     *
     * @ORM\Column(name="id_voyage", type="integer", nullable=true)
     */
    private $idVoyage;

    /**
     * @var int
     *
     * @ORM\Column(name="id_niveau_confort", type="integer")
     */
    private $idNiveauConfort;

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
     * Set idVoyage
     *
     * @param integer $idVoyage
     *
     * @return Etape
     */
    public function setIdVoyage($idVoyage)
    {
        $this->idVoyage = $idVoyage;

        return $this;
    }

    /**
     * Get idVoyage
     *
     * @return int
     */
    public function getIdVoyage()
    {
        return $this->idVoyage;
    }

    /**
     * Set idNiveauConfort
     *
     * @param integer $idNiveauConfort
     *
     * @return Etape
     */
    public function setIdNiveauConfort($idNiveauConfort)
    {
        $this->idNiveauConfort = $idNiveauConfort;

        return $this;
    }

    /**
     * Get idNiveauConfort
     *
     * @return int
     */
    public function getIdNiveauConfort()
    {
        return $this->idNiveauConfort;
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
}

