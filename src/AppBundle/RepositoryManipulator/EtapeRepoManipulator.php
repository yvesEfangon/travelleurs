<?php

namespace AppBundle\RepositoryManipulator;

use AppBundle\Entity\Etape;
use AppBundle\Model\MainSearch;
use Elastica\Query;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Created by PhpStorm.
 * User: Yves Efangon
 * Date: 15/08/2017
 * Time: 13:52
 */
class EtapeRepoManipulator
{

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function searchVoyagesByAddress($request, $sort='distance', $direction='asc'){
        $address        = @$request['address'];
        $locality       = @$request['locality'];
        $lat            = @$request['lat'];
        $lng            = @$request['lng'];
        $adminArea      = @$request['administrative_area_3'];
        $country        = @$request['country'];
        $ageMaxi        = @$request['ageMax'];
        $ageMini        = @$request['ageMin'];
        $dateSejour1    = @$request['dateFinSejour1'];
        $dateSejour2    = @$request['dateFinSejour2'];
        $smockerAllowed = @$request['smockerAllowed'];
        $genreVoyageurs = @$request['genreVoyageurs'];
        $distance       = @$request['distance'];

        if($distance =='' || is_null($distance)) $distance = 500;

        $parameters     = [];


        if($lat == '' || $lng== '') return null;

        $query  = $this->container->get('trav.repository.etape')->createQueryBuilder('e')
            ->join('e.lieuArrivee','lieuArrivee')
            ->join('e.lieuDepart','lieuDepart')
            ->join('e.voyage','voyage')
            ->join('AppBundle:User', 'owner', 'WITH', 'voyage.owner=owner.id')
            ->leftJoin('AppBundle:Image', 'image', 'WITH', 'owner.photoProfile=image.id')
            ->addSelect('lieuArrivee')
            ->addSelect('lieuDepart')
            ->addSelect('voyage')
            ->addSelect('owner')
            ->addSelect('image')
            ->addSelect(
                '
                    ST_Distance(
                            POINT(lieuArrivee.lat,lieuArrivee.lng),
                            POINT(:lat, :lng)
                    ) * 3.14/ 180 * 6371 as distance '
            )
        ;

        $parameters['lat']  = $lat;
        $parameters['lng']  = $lng;

        $query->where('voyage.published = :published');
        $parameters['published']    = 1;


        if($ageMaxi!= '' && $ageMini != '')
        {
            $query->andWhere('voyage.ageMax <= :ageMax');
            $parameters['ageMax']  = $ageMaxi;
            $query->andWhere('voyage.ageMin >= :ageMin');
            $parameters['ageMin']  = $ageMini;
        }

        if($dateSejour1 != '' && $dateSejour2 != ''){
            $parameters = $this->container->get('trav.utilities')->processDates($dateSejour1,$dateSejour2,'e.dateFinSejour',$query,$parameters);
        }

        if($genreVoyageurs != '' && $genreVoyageurs != 3){
            $query->andWhere('voyage.genreVoyageurs = :genreVoyageurs ');
            $parameters['genreVoyageurs']   = $genreVoyageurs;
        }

        if($smockerAllowed != ''){
            $query->andWhere('voyage.smockerAllowed = :smockerAllowed ');
            $parameters['smockerAllowed']   = $smockerAllowed;
        }

        $query->having('distance <= :distance');
        $parameters['distance'] = $distance;

        $query->setParameters($parameters)
            ->groupBy('e.id')

            ->orderBy($sort, $direction);

        return $query;
    }

    public function mainSearch(MainSearch $search){

        if($search->getLat() == null || $search->getLng() == null) return null;

        $boolQuery      = new Query\BoolQuery();

        $geoQuery   = new Query\GeoDistance('location',['lat' => $search->getLat(), 'lon' => $search->getLng()],$search->getDistance().'km');

        $boolQuery->addFilter($geoQuery);

        if($search->getDateDepart() != null && $search->getDateFinSejour() != null){
            $dateRange  = new Query\Range(
                'dateFinSejour',
                [
                    'gte' => \Elastica\Util::convertDate($search->getDateDepart()),
                    'lte' => \Elastica\Util::convertDate($search->getDateFinSejour())
                ]
                );
            $boolQuery->addFilter($dateRange);
        }


        if($search->getAgeMin() != null){
            $queryAgeMin = new Query\Range(
                'ageMin',
                [
                    'gte' => $search->getAgeMin()
                ]
            );

            $boolQuery->addFilter($queryAgeMin);
        }

        if($search->getAgeMax() != null){
           $queryAgeMax = new Query\Range(
               'ageMax',
               [
                   'lte' => $search->getAgeMax()
               ]
           );

           $boolQuery->addFilter($queryAgeMax);
        }


        if($search->getGenreVoyageurs() != null){
            $queryGenre = new Query\Match();
            $queryGenre->setFieldQuery('genreVoyageurs', $search->getGenreVoyageurs());

        }

        $query      = new \Elastica\Query($boolQuery);
        $query->setSort(
            [
                $search->getSort() => ['order' => $search->getDirection()]
            ]
        );

        return $query;

       // $finder     = $this->container->get('fos_elastica.index.travelleurs.etape');

        //return $finder->search($query);

        //Pour terminer: http://obtao.com/blog/2014/09/classer-et-paginer-avec-elasticsearch-et-symfony/
        // Ensuite: https://stackoverflow.com/questions/18975381/foselasticabundle-and-geo-distance-find
        //Et enfin: https://www.google.fr/search?client=ubuntu&hs=B4f&q=foselastica+GeoDistance&oq=foselastica+GeoDistance&gs_l=psy-ab.3...2960.2960.0.3172.1.1.0.0.0.0.61.61.1.1.0....0...1.1.64.psy-ab..0.0.0.iZFkNCL5RZ4

    }

}