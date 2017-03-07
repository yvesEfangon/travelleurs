<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserActivitesSportives
 *
 * @ORM\Table(name="user_activites_sportives")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserActivitesSportivesRepository")
 */
class UserActivitesSportives
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
     * @ORM\Column(name="id_activite", type="integer")
     */
    private $idActivite;


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
     * @return UserActivitesSportives
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
     * Set idActivite
     *
     * @param integer $idActivite
     *
     * @return UserActivitesSportives
     */
    public function setIdActivite($idActivite)
    {
        $this->idActivite = $idActivite;

        return $this;
    }

    /**
     * Get idActivite
     *
     * @return int
     */
    public function getIdActivite()
    {
        return $this->idActivite;
    }
}

