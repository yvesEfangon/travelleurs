<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserPhobbie
 *
 * @ORM\Table(name="user_phobbie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserPhobbieRepository")
 */
class UserPhobbie
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
     * @var string
     *
     * @ORM\Column(name="id_phobbie", type="string", length=255)
     */
    private $idPhobbie;


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
     * @return UserPhobbie
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
     * Set idPhobbie
     *
     * @param string $idPhobbie
     *
     * @return UserPhobbie
     */
    public function setIdPhobbie($idPhobbie)
    {
        $this->idPhobbie = $idPhobbie;

        return $this;
    }

    /**
     * Get idPhobbie
     *
     * @return string
     */
    public function getIdPhobbie()
    {
        return $this->idPhobbie;
    }
}

