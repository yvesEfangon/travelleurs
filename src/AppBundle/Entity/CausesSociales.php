<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CausesSociales
 *
 * @ORM\Table(name="causes_sociales")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CausesSocialesRepository")
 */
class CausesSociales
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
     * @ORM\Column(name="intitule_cause", type="string", length=255)
     */
    private $intituleCause;


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
     * Set intituleCause
     *
     * @param string $intituleCause
     *
     * @return CausesSociales
     */
    public function setIntituleCause($intituleCause)
    {
        $this->intituleCause = $intituleCause;

        return $this;
    }

    /**
     * Get intituleCause
     *
     * @return string
     */
    public function getIntituleCause()
    {
        return $this->intituleCause;
    }
}

