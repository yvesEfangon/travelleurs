<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCauseSociale
 *
 * @ORM\Table(name="user_cause_sociale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserCauseSocialeRepository")
 */
class UserCauseSociale
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
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cause_sociale", type="integer")
     */
    private $idCauseSociale;


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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return UserCauseSociale
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idCauseSociale
     *
     * @param integer $idCauseSociale
     *
     * @return UserCauseSociale
     */
    public function setIdCauseSociale($idCauseSociale)
    {
        $this->idCauseSociale = $idCauseSociale;

        return $this;
    }

    /**
     * Get idCauseSociale
     *
     * @return int
     */
    public function getIdCauseSociale()
    {
        return $this->idCauseSociale;
    }
}

