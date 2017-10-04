<?php

namespace AppBundle\Twig;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Intl\Intl;

class TravExtension extends \Twig_Extension
{
    protected $container;

    /**
     * TravExtension constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('etape_members', array($this, 'membersEtapeFilter')),
            new \Twig_SimpleFilter('isregistered_inetape', array($this, 'isRegisteredInEtape')),
            new \Twig_SimpleFilter('countryName', array($this, 'countryName')),
        ];
    }

    public function membersEtapeFilter($id_etap){

        if(!is_numeric($id_etap)) return null;

        $etape = $this->container->get('trav.repository.etape')->find($id_etap);

        if(!$etape) return null;

        return $etape->getUsers();
    }

    public function isRegisteredInEtape($users){
        $user   = $this->container->get('security.token_storage')->getToken()->getUser();

        return $users->contains($user);
    }

    public function countryName($countryCode){
        return Intl::getRegionBundle()->getCountryName($countryCode);
    }
    

}
