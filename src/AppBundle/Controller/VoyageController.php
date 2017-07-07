<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Voyage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VoyageController extends Controller
{
    public function indexAction()
    {
        $user       = $this->getUser();

        if(!$user) $this->redirect($this->generateUrl('homepage'));
        $repo           = $this->getDoctrine()->getRepository('AppBundle:Voyage');
        $voyages        = $repo->findBy(['owner' => $user]);
        $parcticipant   = $repo->findVoyageUsersById(['user' => $user]);

        $voyages        = array_merge($voyages,$parcticipant);

        return $this->render(
            'AppBundle:Voyage:index.html.twig',
            [
                'voyages' => $voyages
            ]
            );
    }

    public function addAction(Request $request){

        $voyage = new Voyage();

        $form   = $this->createForm(
            'AppBundle\Form\VoyageType',
            $voyage,
            [
                'action' => $this->generateUrl('trav_add_voyage'),
                'method' => 'POST'
            ]
            );

        if($request->isMethod('POST')){
            $form->handleRequest($request);

            //Pour chaque soumission du formulaire:
            if($form->isValid()){
                
            }
        }
        return $this->render('AppBundle:Voyage:add.html.twig');
    }

    
}
