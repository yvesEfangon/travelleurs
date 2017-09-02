<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 30/08/2017
 * Time: 09:45
 */

namespace AppBundle\Service;


class FormServices
{

    private $container;

    /**
     * FormServices constructor.
     * @param $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getGenres(){
        $resultat   = array();
        $genres = $this->container->get('trav.repository.genre')->findAll();
        foreach ($genres as $genre){
            $resultat[$genre->getName()]  = $genre->getId();
        }

        return $resultat;
    }

}