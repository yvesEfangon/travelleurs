<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\GMapEntity;


/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LieuRepository")
 */
class Lieu extends GMapEntity

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
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=100, nullable=true)
     */
    private $location;

    /**
     *
     * @ORM\PrePersist
     */
    public function initLocation(){
        $this->location =
            number_format(str_replace(",", ".", $this->getLat()), 8, '.', '')
            .",".
            number_format(str_replace(",", ".", $this->getLng()), 8, '.', '');
    }

    public function __construct()
    {

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

    public function __toString()
    {
       return 'Lieu';
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return Lieu
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }


}

