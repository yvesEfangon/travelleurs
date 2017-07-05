<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\User;
use AppBundle\Form\AddressType;
use AppBundle\Form\SearchVoyageIndexType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package AppBundle\Controller
 */

class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $form   = $this->createForm(SearchVoyageIndexType::class,null,[
            'action'=> $this->generateUrl('trav_search_form'),
            'method'=> 'POST',
            'attr'=> ['class'=>'form-horizontal']
        ]);
        

        return $this->render('AppBundle:Default:index.html.twig', [
            'form_search' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     */
    public function searchAction(Request $request){

    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function ourstoryAction(){
        return $this->render('AppBundle:Default:ourstory.html.twig');
   }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function marketplaceAction(){
        return $this->render('AppBundle:Default:marketplace.html.twig');
    }

    public function aboutusAction(){
        return $this->render('AppBundle:Default:aboutus.html.twig');
    }

    public function bonplanAction(){
        return $this->render('AppBundle:Default:bonplan.html.twig');
    }

    public function faqAction(){
        return $this->render('AppBundle:Default:faq.html.twig');
    }

    public function contactAction(){
        return $this->render('AppBundle:Default:contact.html.twig');
    }

    public function editaddressAction(Request $request, User $user){
        $address = new Address();
        $req_addr = $request->get('address');
        $country_id = @$req_addr['country'];

        $address_form = $this->createForm(
            AddressType::class,
            $address,
            [
                'data' => array('country_id' => $country_id),
                'entity_manager' => $this->get('doctrine.orm.entity_manager'),
                'action' => $this->generateUrl('trav_edit_address',['user' => $user->getId()]),
                'method' => 'POST',
                'attr' => ['class' => 'form-horizontal']
            ]
        );

        $address_form->handleRequest($request);

        if($address_form->isSubmitted() && $address_form->isValid()){
            $data = $address_form->getData();
            $data->setUser($user);

            $this->get('doctrine.orm.entity_manager')->persist($data);
            $this->get('doctrine.orm.entity_manager')->flush();

        }

        return $this->redirect($this->generateUrl('fos_user_profile_edit'));


    }

    public function addProfileImageAction(Request $request,User $user)
    {

    }

    
}
