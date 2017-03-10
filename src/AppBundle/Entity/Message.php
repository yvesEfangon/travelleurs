<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message
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
    private $sender;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User",cascade={"persist"})
     */
    private $receiver;

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

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="readOn", type="datetime")
     */
    private $readOn;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", nullable=true)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    public function __construct()
    {
        $this->createdOn = new \DateTime();
        $this->modifiedOn = new \DateTime();
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
     * Set idUserFrom
     *
     * @param integer $idUserFrom
     *
     * @return Message
     */
    public function setIdUserFrom($idUserFrom)
    {
        $this->idUserFrom = $idUserFrom;

        return $this;
    }

    /**
     * Get idUserFrom
     *
     * @return int
     */
    public function getIdUserFrom()
    {
        return $this->idUserFrom;
    }

    /**
     * Set idUserTo
     *
     * @param integer $idUserTo
     *
     * @return Message
     */
    public function setIdUserTo($idUserTo)
    {
        $this->idUserTo = $idUserTo;

        return $this;
    }

    /**
     * Get idUserTo
     *
     * @return int
     */
    public function getIdUserTo()
    {
        return $this->idUserTo;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Message
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Message
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @return User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param User $sender
     * @return Message
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return int
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @param int $receiver
     * @return Message
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
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
     * @return Message
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
     * @return Message
     */
    public function setModifiedOn($modifiedOn)
    {
        $this->modifiedOn = $modifiedOn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReadOn()
    {
        return $this->readOn;
    }

    /**
     * @param \DateTime $readOn
     * @return Message
     */
    public function setReadOn($readOn)
    {
        $this->readOn = $readOn;
        return $this;
    }



}

