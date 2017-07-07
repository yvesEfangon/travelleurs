<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Request\ParamFetcher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\QueryParam;

/**
 * Class JsonController
 * @package AppBundle\Controller
 *
 */
class JsonController extends Controller
{
    /**
     * @param $paramFetcher
     * @return array|Response
     * @Get(name="listContry")
     * @QueryParam(name="country", requirements="[A-Za-z0-9\s]+", default=null, nullable=false )
     */
    public function getcountryAction(ParamFetcher $paramFetcher){
        

        $term       = $paramFetcher->get('country');
        $_em = $this->getDoctrine()->getManager();
        $countries = $_em->getRepository('AppBundle:Countries')->findCountryByTerm($term);

        return $this->returnResponse(['success' => true, 'data' => $countries]);
    }


    /**
     * @param ParamFetcher $paramFetcher
     * @return JsonResponse
     *
     * @Get(name="listCities")
     * @QueryParam(name="city", requirements="[A-Za-z0-9\s]+", default=null, nullable=false)
     */
    public function getcityAction(ParamFetcher $paramFetcher){
        $term   = $paramFetcher->get('city');
        $_em    = $this->getDoctrine()->getManager();
        $cities = $_em->getRepository('AppBundle:Cities')->findCityByTerm($term);

        return $this->returnResponse(['success' => true, 'data' => $cities]);
    }

    /**
     * @param string $data
     * @return JsonResponse
     */
    private function returnResponse($data)
    {
        $callback = function ($value) {//ISO8601
            return $value instanceof \DateTime
                ? $value->format('Y-m-d')
                : $value;
        };
        $dbData    = $data['data'];
        if (is_array($dbData)) {
            foreach ($dbData as $k=>$a) {
                $dbData[$k]    = array_map($callback, $a);
            }
        }

        $data['data']   = $dbData;

        return new JsonResponse($data);
    }


}
