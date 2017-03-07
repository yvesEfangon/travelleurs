<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voyage
 *
 * @ORM\Table(name="voyage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VoyageRepository")
 */
class Voyage
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
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="annonce", type="text", nullable=true)
     */
    private $annonce;

    /**
     * @var string
     *
     * @ORM\Column(name="profil_organisateur", type="string", length=50, nullable=true)
     */
    private $profilOrganisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="profil_covoyageur", type="string", length=50, nullable=true)
     */
    private $profilCovoyageur;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Voyage
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Voyage
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set annonce
     *
     * @param string $annonce
     *
     * @return Voyage
     */
    public function setAnnonce($annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return string
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set profilOrganisateur
     *
     * @param string $profilOrganisateur
     *
     * @return Voyage
     */
    public function setProfilOrganisateur($profilOrganisateur)
    {
        $this->profilOrganisateur = $profilOrganisateur;

        return $this;
    }

    /**
     * Get profilOrganisateur
     *
     * @return string
     */
    public function getProfilOrganisateur()
    {
        return $this->profilOrganisateur;
    }

    /**
     * Set profilCovoyageur
     *
     * @param string $profilCovoyageur
     *
     * @return Voyage
     */
    public function setProfilCovoyageur($profilCovoyageur)
    {
        $this->profilCovoyageur = $profilCovoyageur;

        return $this;
    }

    /**
     * Get profilCovoyageur
     *
     * @return string
     */
    public function getProfilCovoyageur()
    {
        return $this->profilCovoyageur;
    }
}

