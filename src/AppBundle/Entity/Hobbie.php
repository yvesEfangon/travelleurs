<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hobbie
 *
 * @ORM\Table(name="hobbie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HobbieRepository")
 */
class Hobbie
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
     * @return Hobbie
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

