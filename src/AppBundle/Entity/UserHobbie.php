<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserHobbie
 *
 * @ORM\Table(name="user_hobbie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserHobbieRepository")
 */
class UserHobbie
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
     * @ORM\Column(name="id_hobbie", type="integer")
     */
    private $idHobbie;


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
     * @return UserHobbie
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
     * Set idHobbie
     *
     * @param integer $idHobbie
     *
     * @return UserHobbie
     */
    public function setIdHobbie($idHobbie)
    {
        $this->idHobbie = $idHobbie;

        return $this;
    }

    /**
     * Get idHobbie
     *
     * @return int
     */
    public function getIdHobbie()
    {
        return $this->idHobbie;
    }
}

