<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlbumRepository")
 */
class Album
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
     * @var User
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User",cascade={"persist"})
     */
    private $owner;

    /**
     * @var Image
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Image",cascade={"persist"})
     */
    private $images;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_album", type="string", length=100, nullable=false, unique=true)
     */
    private $nomAlbum;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="datetime")
     */
    private $createdOn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modifiedOn", type="datetime")
     */
    private $modifiedOn;

    public function __construct()
    {
        $this->createdOn = new \DateTime();
        $this->modifiedOn = new \DateTime();
        $this->nomAlbum     = 'Default';
        $this->images       = new ArrayCollection();
    }

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
     * Set nomAlbum
     *
     * @param string $nomAlbum
     *
     * @return Album
     */
    public function setNomAlbum($nomAlbum)
    {
        $this->nomAlbum = $nomAlbum;

        return $this;
    }

    /**
     * Get nomAlbum
     *
     * @return string
     */
    public function getNomAlbum()
    {
        return $this->nomAlbum;
    }

    /**
     * @return User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     * @return Album
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return Image
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param Image $image
     * @return Album
     */
    public function addImage(Image $image)
    {
        $this->images[] = $image;
        return $this;
    }

    public function removeImage(Image $image){
        $this->images->removeElement($image);

        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param \DateTime $createdOn
     * @return Album
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedOn()
    {
        return $this->modifiedOn;
    }

    /**
     * @param \DateTime $modifiedOn
     * @return Album
     */
    public function setModifiedOn($modifiedOn)
    {
        $this->modifiedOn = $modifiedOn;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Album
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }



}

