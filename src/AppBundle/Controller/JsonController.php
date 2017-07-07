<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class JsonController
 * @package AppBundle\Controller
 *
 */
class JsonController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     *
     * @Route("/getcountries",options={"expose"=true}, name="get_countries")
     */
    public function countryAction(Request $request){
        
        $response = new JsonResponse();

        if ($request->isXmlHttpRequest()) {
            $term = trim(strip_tags($request->get('country')));
            $_em = $this->getDoctrine()->getManager();
            $countries = $_em->getRepository('AppBundle:Countries')->findCountryByTerm($term);

            $response->setData($countries);
        }

        return $response;
    }
}
