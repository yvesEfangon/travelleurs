<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 15/09/2017
 * Time: 16:57
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Thread as BaseThread;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class ThreadsComment extends BaseThread
{
    /**
     * @var string $id
     *
     * @ORM\Id
     * @ORM\Column(type="string", length=100)
     */
    protected $id;
}