<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phobbie
 *
 * @ORM\Table(name="phobbie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PhobbieRepository")
 */
class Phobbie
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
     * @ORM\Column(name="phobbie", type="string", length=255)
     */
    private $phobbie;

    /**
     * @var string
     *
     * @ORM\Column(name="intesite", type="string", length=100)
     */
    private $intesite;


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
     * Set phobbie
     *
     * @param string $phobbie
     *
     * @return Phobbie
     */
    public function setPhobbie($phobbie)
    {
        $this->phobbie = $phobbie;

        return $this;
    }

    /**
     * Get phobbie
     *
     * @return string
     */
    public function getPhobbie()
    {
        return $this->phobbie;
    }

    /**
     * Set intesite
     *
     * @param string $intesite
     *
     * @return Phobbie
     */
    public function setIntesite($intesite)
    {
        $this->intesite = $intesite;

        return $this;
    }

    /**
     * Get intesite
     *
     * @return string
     */
    public function getIntesite()
    {
        return $this->intesite;
    }
}

