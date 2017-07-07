<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 06/07/17
 * Time: 00:21
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Genre
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private    $id;

    /**
     * @ORM\Column(name="genre",type="string", length=10)
     */
    private $genre;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Genre
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     * @return Genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    

}