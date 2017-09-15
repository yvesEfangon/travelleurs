<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 15/09/2017
 * Time: 16:56
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Comment as BaseComment;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Thread of this comment
     *
     * @var ThreadsComment
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ThreadsComment")
     */
    protected $thread;
}