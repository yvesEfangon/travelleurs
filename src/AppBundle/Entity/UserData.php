<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserData
 *
 * @ORM\Table(name="user_data")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserDataRepository")
 */
class UserData
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
     * @var bool
     *
     * @ORM\Column(name="fumeur", type="boolean")
     */
    private $fumeur;

    /**
     * @var string
     *
     * @ORM\Column(name="bio", type="text")
     */
    private $bio;

    /**
     * @var string
     *
     * @ORM\Column(name="photo_profil", type="string", length=255)
     */
    private $photoProfil;

    /**
     * @var string
     *
     * @ORM\Column(name="marital_status", type="string", length=100)
     */
    private $maritalStatus;

    /**
     * @var string
     *
     * @ORM\Column(name="degre_conversation", type="string", length=255)
     */
    private $degreConversation;


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
     * @return UserData
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
     * Set fumeur
     *
     * @param boolean $fumeur
     *
     * @return UserData
     */
    public function setFumeur($fumeur)
    {
        $this->fumeur = $fumeur;

        return $this;
    }

    /**
     * Get fumeur
     *
     * @return bool
     */
    public function getFumeur()
    {
        return $this->fumeur;
    }

    /**
     * Set bio
     *
     * @param string $bio
     *
     * @return UserData
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set photoProfil
     *
     * @param string $photoProfil
     *
     * @return UserData
     */
    public function setPhotoProfil($photoProfil)
    {
        $this->photoProfil = $photoProfil;

        return $this;
    }

    /**
     * Get photoProfil
     *
     * @return string
     */
    public function getPhotoProfil()
    {
        return $this->photoProfil;
    }

    /**
     * Set maritalStatus
     *
     * @param string $maritalStatus
     *
     * @return UserData
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    /**
     * Get maritalStatus
     *
     * @return string
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * Set degreConversation
     *
     * @param string $degreConversation
     *
     * @return UserData
     */
    public function setDegreConversation($degreConversation)
    {
        $this->degreConversation = $degreConversation;

        return $this;
    }

    /**
     * Get degreConversation
     *
     * @return string
     */
    public function getDegreConversation()
    {
        return $this->degreConversation;
    }
}

