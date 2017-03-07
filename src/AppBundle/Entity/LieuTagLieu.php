<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LieuTagLieu
 *
 * @ORM\Table(name="lieu_tag_lieu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LieuTagLieuRepository")
 */
class LieuTagLieu
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
     * @ORM\Column(name="id_lieu", type="integer")
     */
    private $idLieu;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tag", type="integer")
     */
    private $idTag;


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
     * Set idLieu
     *
     * @param integer $idLieu
     *
     * @return LieuTagLieu
     */
    public function setIdLieu($idLieu)
    {
        $this->idLieu = $idLieu;

        return $this;
    }

    /**
     * Get idLieu
     *
     * @return int
     */
    public function getIdLieu()
    {
        return $this->idLieu;
    }

    /**
     * Set idTag
     *
     * @param integer $idTag
     *
     * @return LieuTagLieu
     */
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;

        return $this;
    }

    /**
     * Get idTag
     *
     * @return int
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
}

