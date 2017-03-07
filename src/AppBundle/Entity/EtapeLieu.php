<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtapeLieu
 *
 * @ORM\Table(name="etape_lieu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtapeLieuRepository")
 */
class EtapeLieu
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
     * @var int
     *
     * @ORM\Column(name="id_etape", type="integer")
     */
    private $idEtape;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lieu_source", type="integer")
     */
    private $idLieuSource;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lieu_destination", type="integer")
     */
    private $idLieuDestination;


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
     * Set idEtape
     *
     * @param integer $idEtape
     *
     * @return EtapeLieu
     */
    public function setIdEtape($idEtape)
    {
        $this->idEtape = $idEtape;

        return $this;
    }

    /**
     * Get idEtape
     *
     * @return int
     */
    public function getIdEtape()
    {
        return $this->idEtape;
    }

    /**
     * Set idLieuSource
     *
     * @param integer $idLieuSource
     *
     * @return EtapeLieu
     */
    public function setIdLieuSource($idLieuSource)
    {
        $this->idLieuSource = $idLieuSource;

        return $this;
    }

    /**
     * Get idLieuSource
     *
     * @return int
     */
    public function getIdLieuSource()
    {
        return $this->idLieuSource;
    }

    /**
     * Set idLieuDestination
     *
     * @param integer $idLieuDestination
     *
     * @return EtapeLieu
     */
    public function setIdLieuDestination($idLieuDestination)
    {
        $this->idLieuDestination = $idLieuDestination;

        return $this;
    }

    /**
     * Get idLieuDestination
     *
     * @return int
     */
    public function getIdLieuDestination()
    {
        return $this->idLieuDestination;
    }
}

