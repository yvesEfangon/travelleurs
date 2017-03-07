<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtapeTheme
 *
 * @ORM\Table(name="etape_theme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtapeThemeRepository")
 */
class EtapeTheme
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
     * @ORM\Column(name="id_theme", type="integer")
     */
    private $idTheme;

    /**
     * @var int
     *
     * @ORM\Column(name="id_etape", type="integer")
     */
    private $idEtape;


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
     * Set idTheme
     *
     * @param integer $idTheme
     *
     * @return EtapeTheme
     */
    public function setIdTheme($idTheme)
    {
        $this->idTheme = $idTheme;

        return $this;
    }

    /**
     * Get idTheme
     *
     * @return int
     */
    public function getIdTheme()
    {
        return $this->idTheme;
    }

    /**
     * Set idEtape
     *
     * @param integer $idEtape
     *
     * @return EtapeTheme
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
}

