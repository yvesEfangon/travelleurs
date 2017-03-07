<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AvisRepository")
 */
class Avis
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
     * @ORM\Column(name="id_etape_user", type="integer")
     */
    private $idEtapeUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_from", type="integer")
     */
    private $idUserFrom;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user_to", type="integer")
     */
    private $idUserTo;


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
     * Set idEtapeUser
     *
     * @param integer $idEtapeUser
     *
     * @return Avis
     */
    public function setIdEtapeUser($idEtapeUser)
    {
        $this->idEtapeUser = $idEtapeUser;

        return $this;
    }

    /**
     * Get idEtapeUser
     *
     * @return int
     */
    public function getIdEtapeUser()
    {
        return $this->idEtapeUser;
    }

    /**
     * Set idUserFrom
     *
     * @param integer $idUserFrom
     *
     * @return Avis
     */
    public function setIdUserFrom($idUserFrom)
    {
        $this->idUserFrom = $idUserFrom;

        return $this;
    }

    /**
     * Get idUserFrom
     *
     * @return int
     */
    public function getIdUserFrom()
    {
        return $this->idUserFrom;
    }

    /**
     * Set idUserTo
     *
     * @param integer $idUserTo
     *
     * @return Avis
     */
    public function setIdUserTo($idUserTo)
    {
        $this->idUserTo = $idUserTo;

        return $this;
    }

    /**
     * Get idUserTo
     *
     * @return int
     */
    public function getIdUserTo()
    {
        return $this->idUserTo;
    }
}

