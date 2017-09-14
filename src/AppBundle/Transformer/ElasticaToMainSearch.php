<?php
/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 14/09/2017
 * Time: 18:22
 */

namespace AppBundle\Transformer;

use FOS\ElasticaBundle\Doctrine\AbstractElasticaToModelTransformer;
use Doctrine\ORM\Query;

class ElasticaToMainSearch extends AbstractElasticaToModelTransformer
{
    /**
     * Fetches objects by theses identifier values.
     *
     * @param array $identifierValues ids values
     * @param Boolean $hydrate whether or not to hydrate the objects, false returns arrays
     * Read: http://obtao.com/blog/2014/05/elasticsearch-symfony-hydrating-objects/
     *
     * @return array of objects or arrays
     */
    protected function findByIdentifiers(array $identifierValues, $hydrate)
    {
        if (empty($identifierValues)) {
            return array();
        }
        $hydrationMode = $hydrate ? Query::HYDRATE_OBJECT : Query::HYDRATE_ARRAY;
        $qb = $this->registry
            ->getManagerForClass('AppBundle:Etape')
            ->getRepository('AppBundle:Etape')
            ->createQueryBuilder('etape')
            ->select('etape,voyage, owner, lieuDepart, lieuArrivee')
            ->join('etape.voyage','voyage')
            ->join('AppBundle:User', 'owner', 'WITH', 'voyage.owner=owner.id')
            ->leftJoin('AppBundle:Image', 'image', 'WITH', 'owner.photoProfile=image.id')
            ->join('etape.lieuArrivee','lieuArrivee')
            ->join('etape.lieuDepart','lieuDepart')
        ;
        /* @var $qb \Doctrine\ORM\QueryBuilder */
        $qb->where($qb->expr()->in('a.'.$this->options['identifier'], ':values'))
            ->setParameter('values', $identifierValues);

        return $qb->getQuery()->setHydrationMode($hydrationMode)->execute();
    }


}