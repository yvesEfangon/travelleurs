<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentreInteret
 *
 * @ORM\Table(name="centre_interet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CentreInteretRepository")
 */
class CentreInteret
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
     * @ORM\Column(name="hobbie", type="string", length=255)
     */
    private $hobbie;


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
     * Set hobbie
     *
     * @param string $hobbie
     *
     * @return CentreInteret
     */
    public function setHobbie($hobbie)
    {
        $this->hobbie = $hobbie;

        return $this;
    }

    /**
     * Get hobbie
     *
     * @return string
     */
    public function getHobbie()
    {
        return $this->hobbie;
    }
}

