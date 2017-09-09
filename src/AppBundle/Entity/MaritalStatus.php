<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 25/08/2017
 * Time: 18:08
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class MaritalStatus
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="maritalStatus")
 * @ORM\Entity()
 */
class MaritalStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="status", length=100)
     */
    private $status;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MaritalStatus
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return MaritalStatus
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


}