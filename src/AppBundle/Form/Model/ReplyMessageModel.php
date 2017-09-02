<?php

/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 31/08/2017
 * Time: 20:02
 */
namespace AppBundle\Form\Model;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @author Titouan Galopin <galopintitouan@gmail.com>
 */
class ReplyMessageModel
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    private $body;
    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    /**
     * @param string $body
     */
    public function setBody($body)
    {
        \Webmozart\Assert\Assert::string($body);
        \Webmozart\Assert\Assert::notEmpty($body);
        $this->body = $body;
    }
}